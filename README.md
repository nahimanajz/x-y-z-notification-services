# x-y-z-notification-services
 Sms and Email notification services which help client to subscribe on `basic, silver, or gold for SMS notifications` and `basic or premium subscription for Email notifications`
## Installation guide
``` 
git clone (https://github.com/nahimanajz/x-y-z-notification-services) 
cd x-y-z-notification-services
composer update
php artisan migrate
php artisan serve
``` 
Then use postman to fetch the following enpoints 👇🏾 to test functionalisty 
get postman from here](https://www.postman.com/)
### APIs 

|Method| endpoint |
|------|---------|
|POST|api/signup|
|POST|api/login|
|POST|api/subscribe|
|PUT|/api/change/subscription/{subscription_id}|

