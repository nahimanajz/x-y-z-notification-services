# x-y-z-notification-services
 Sms and Email notification services which help client to subscribe on `basic, silver, or gold for SMS notifications` and `basic or premium subscription for Email notifications`
## Installation guide
``` 
git clone https://github.com/nahimanajz/x-y-z-notification-services 
cd x-y-z-notification-services
composer update
cp .env.example .env
specify database
php artisan migrate
php artisan serve

``` 
Then use postman to fetch the following enpoints 👇🏾 to test functionalisty 
get postman from [here](https://www.postman.com/)
Use `127.0.0.1:8000` to view swagger documentation
### Test
 - php artisan test
 
### List of endpoints  
|Method| endpoint |
|------|---------|
|POST|api/signup|
|POST|api/login|
|POST|api/subscribe|
|PUT|/api/change/subscription/{subscription_id}|

### Tools used
- PHP: Laravel Framework
- Mysql Database but it okay you can user Postgress 
- Rate limit and throlling are enabled per user and whole system as well
