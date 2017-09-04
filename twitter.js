describe('OAuth1.0',function(){
  var OAuth = require('oauth');
 
  it('tests trends Twitter API v1.1',function(done){
    var oauth = new OAuth.OAuth(
      'https://api.twitter.com/oauth/request_token',
      'https://api.twitter.com/oauth/access_token',
      'ZEWCdvUfNn8qVTLPK1NIYCdLw',
      'Ou2LXtTEv14cAkjjlEDIqQp7gAPH0TLPp7G4URvR6KkoijjlNB',
      '1.0A',
      null,
      'HMAC-SHA1'
    );
    oauth.get(
      'https://api.twitter.com/1.1/trends/place.json?id=23424977',
      '190768416-CtQIsV2kKMkl9558Etm2fSnXenwRebcmuvXCOZCL', //test user token 
      ' BVdXQKoPcSW8xD5FxIDQO8vajbZJiWIxvpTQbqTyrlJ31', //test user secret             
      function (e, data, res){
        if (e) console.error(e);        
        console.log(require('util').inspect(data));
        done();      
      });    
  });
});
