<?php

class PerchAssets_Importer
{

	public function add_item($data)
	{
		if (!count($data)) return;

		$defaults = [
			'type'   => 'image',
			'bucket' => 'default',
		];

		$data = PerchUtil::extend($defaults, $data);

		$Perch  = PerchAdmin::fetch();

		$Bucket  = PerchResourceBuckets::get($data['bucket']);

		$Bucket->initialise();

		// As this is an import.
		$Bucket->enable_non_uploaded_files();

		if ($Bucket->ready_to_write()) {

			$Assets = new PerchAssets_Assets;

			$store = [];

			$file_path = $data['path'];
			$file_name = basename($file_path);

			$AssetMeta = $Assets->get_meta_data($file_path, $file_name);

			if ($data['type'] == 'image') {
				$PerchImage = new PerchImage;
                $PerchImage->orientate_image($file_path);
			}


			$result   = $Bucket->write_file($file_path, $file_name);	

			$target   = $result['path'];
	        $filename = $result['name'];
	        $filesize = filesize($file_path);

	        $store['_default'] = rtrim($Bucket->get_web_path(), '/').'/'.$filename;

	        $store['path']   = $filename;
            $store['size']   = $filesize ?: filesize($target);
            $store['bucket'] = $Bucket->get_name();

            // Is this an SVG?
            $svg = false;

            $size = getimagesize($target);
            if (PerchUtil::count($size)) {
                $store['w'] = $size[0];
                $store['h'] = $size[1];
                if (isset($size['mime'])) $store['mime'] = $size['mime'];
            }else{
                $PerchImage = new PerchImage;

                if ($PerchImage->is_webp($target)) {

                    $store['mime'] = 'image/webp';

                }elseif ($PerchImage->is_svg($target)) {
                    $svg = true;
                    $size = $PerchImage->get_svg_size($target);
                    if (PerchUtil::count($size)) {
                        $store['w'] = $size['w'];
                        $store['h'] = $size['h'];
                        if (isset($size['mime'])) $store['mime'] = $size['mime'];
                    }
                }else{
                    // It's not an image (according to getimagesize) and not an SVG.
                    if ($this->Tag->detect_type()) {
                        // if we have permission to guess, our guess is that it's a file.
                        PerchUtil::debug('Guessing file', 'error');
                        $this->Tag->set('type', 'file');
                    }

                    $store['mime'] = PerchUtil::get_mime_type($target);
                }
            }

             // thumbnail
            if ($data['type']=='image') {

                $PerchImage = new PerchImage;
                $PerchImage->set_density(2);

                $result = false;

                if (!$result) $result = $PerchImage->resize_image($target, 150, 150, false, 'thumb');
                if (is_array($result)) {
                    //PerchUtil::debug($result, 'notice');
                    if (!isset($store['sizes'])) $store['sizes'] = array();

                    $variant_key = 'thumb';
                    $tmp = array();
                    $tmp['w']        = $result['w'];
                    $tmp['h']        = $result['h'];
                    $tmp['target_w'] = 150;
                    $tmp['target_h'] = 150;
                    $tmp['density']  = 2;
                    $tmp['path']     = $result['file_name'];
                    $tmp['size']     = filesize($result['file_path']);
                    $tmp['mime']     = (isset($result['mime']) ? $result['mime'] : $store['mime']);

                    if (is_array($result) && isset($result['_resourceID'])) {
                        $tmp['assetID'] = $result['_resourceID'];
                    }

                    $store['sizes'][$variant_key] = $tmp;
                }
                unset($result);
                unset($PerchImage);
            }
            if ($data['type']=='file') {
                $PerchImage = new PerchImage;
                $PerchImage->set_density(2);

                $result = $PerchImage->thumbnail_file($target, 150, 150, false);
                if (is_array($result)) {
                    if (!isset($store['sizes'])) $store['sizes'] = array();

                    $variant_key = 'thumb';
                    $tmp = array();
                    $tmp['w']        = $result['w'];
                    $tmp['h']        = $result['h'];
                    $tmp['target_w'] = 150;
                    $tmp['target_h'] = 150;
                    $tmp['density']  = 2;
                    $tmp['path']     = $result['file_name'];
                    $tmp['size']     = filesize($result['file_path']);
                    $tmp['mime']     = (isset($result['mime']) ? $result['mime'] : '');

                    if (is_array($result) && isset($result['_resourceID'])) {
                        $tmp['assetID'] = $result['_resourceID'];
                    }

                    $store['sizes'][$variant_key] = $tmp;
                }
                unset($result);
                unset($PerchImage);
            }

            $Resources = new PerchResources;
            $parentID = $Resources->log($this->app_id, $store['bucket'], $store['path'], 0, 'orig', false, $store, $AssetMeta);

             // variants
            if (isset($store['sizes']) && PerchUtil::count($store['sizes'])) {
                foreach($store['sizes'] as $key=>$size) {
                    $Resources->log($this->app_id, $store['bucket'], $size['path'], $parentID, $key, false, $size, $AssetMeta);
                }
            }

            $store['id'] = $parentID;

            return $store;
		}



		$Collection = $this->get_active_collection();
		$options 	= $Collection->get_options();

		$content_vars = [];
		$search_text  = '';

		$this->validate_input($data);

		$tags = $this->get_template_tags();
		$seen_tags = [];

		foreach($tags as $Tag) {
			if (array_key_exists($Tag->id, $data) && !in_array($Tag->id, $seen_tags)) {
				$seen_tags[] = $Tag->id;

				$FieldType = $this->get_field_type($Tag, $tags);

				// import the data
				$content_vars[$Tag->id] = $FieldType->import_data($data);

				// find the title
				$content_vars = PerchContent_Util::determine_title($Tag, $content_vars[$Tag->id], $options, $content_vars);
				
				// build up a search string
				$search_text .= ' '.$FieldType->get_search_text($content_vars[$Tag->id]);
			}
		}

		if (count($content_vars)) {

			$Item = $Collection->add_new_item();

			// Set the ID
			$content_vars['_id'] 	= $Item->itemID();

			$new_data = [];
            $new_data['itemJSON']   = PerchUtil::json_safe_encode($content_vars);
            $new_data['itemSearch'] = trim($search_text);

            $Item->update($new_data);

            // Publish 
            $Item->publish();

            // Sort based on region options
            $Collection->sort_items($Item->itemID());

            // Index it
            $Item->index();

            // Update the page modified date
            $Collection->update(array('collectionUpdated'=>date('Y-m-d H:i:s')));
            $Perch->event('collection.publish', $Collection);
		}

	}

	private function get_active_collection()
	{
		if (!$this->Collection) {
			throw new \Exception('No collection. Call PerchCollectionImporter::set_collection() to set.');
		}

		return $this->Collection;
	}

	private function get_template()
	{
		if (!$this->Template) {
			throw new \Exception('No template. Call PerchCollectionImporter::set_template() to set.');
		}

		return $this->Template;
	}

	private function validate_input($data)
	{
		$Template        = $this->get_template();
		$tags            = $this->get_template_tags();
		$required_fields = $this->get_required_fields($tags, $Template);

		if (PerchUtil::count($required_fields)) {
			foreach($required_fields as $id) {
				if (!array_key_exists($id, $data)) {
					throw new \Exception('Missing required field: '. $id);
				}
			}
		}

	}

	private function get_required_fields($tags, $Template)
	{
		$req       = [];
		$seen_tags = [];

	    if (PerchUtil::count($tags)) {

		    foreach($tags as $tag) {

		        if (!in_array($tag->id(), $seen_tags)) {
		            if (PerchUtil::bool_val($tag->required())) {

		            	if (!PERCH_RUNWAY && $tag->runway()) {
			            	continue;
						}

		                $req[] = $tag->id();

		            }

		            $seen_tags[] = $tag->id();
		        }
		    }
		}

		return $req;
	}

	private function get_template_tags()
	{
		if (!is_null($this->template_tags)) {
			return $this->template_tags;
		}

		$Template = $this->get_template();

		$this->template_tags = $Template->find_all_tags_and_repeaters();

		return $this->template_tags;
	}

	private function get_field_type($Tag, $tags)
	{
		return PerchFieldTypes::get($Tag->type(), $this->Form, $Tag, $tags);
	}
}