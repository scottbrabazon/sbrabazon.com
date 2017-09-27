var datapoint = require('datapoint-js')
// or if you run `npm install datapoint-js`
// var datapoint = require('datapoint-js')

// Create a new datapoint object with your API key
datapoint.set_key("bc6def26-5df4-4903-8c34-11afdd4d1c7c")

// Set out current location
var lat = 53.479
var lon = -2.246

// Before we get any data we need to find out our nearest observation and forecast sites
var obs_site = datapoint.get_nearest_obs_site(lon, lat)
var forecast_site = datapoint.get_nearest_forecast_site(lon, lat)

// First we shall get the current observations and print them out
var obs = datapoint.get_obs_for_site(obs_site.id)
var obs_for_today = obs.days[obs.days.length-1]
var current_obs = obs_for_today.timesteps[obs_for_today.timesteps.length-1]

const weatherContainer = document.getElementById("weather-container");

weatherContainer.innerHTML = '<p class="' + current_obs.weather.text.replace(/\s+/g, '').replace(")", "").replace("(", "").toLowerCase() + '"> It is currently ' + current_obs.weather.text.toLowerCase() + " with a temperature of " + current_obs.temperature.value + "°" + current_obs.temperature.units + " in " + forecast_site.name + "</p>";

