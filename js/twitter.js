var Twitter = require('twitter');
 
var client = new Twitter({
  consumer_key: 'HM9N1jNSsU0voJPTbo182wsGa',
  consumer_secret: 'IWM5QgjjXn7PLPEiFdlykmKqVX8tRTNqDKVjPNnw6ZKstlgHZx',
  access_token_key: '190768416-lWMDc3KjM5TshRwH8NpSfqBPtUKxuJVy8vAiJghL',
  access_token_secret: 'n7ElSVkURefRulOqASditreKO3vtwPoEjW7ee4YnDaBWS'
});
 
var params = {screen_name: 'nodejs'};
client.get('statuses/user_timeline', params, function(error, tweets, response) {
  if (!error) {
    console.log(tweets);
  }
});