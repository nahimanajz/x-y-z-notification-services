# x-y-z-notification-services
 Sms and Email notification services which help client to subscribe on `sms[basic, silver, gold]` and `email[basic and premium]`
## Installation guide
``` 
- git clone [this](https://github.com/nahimanajz/x-y-z-notification-services) repository
cd x-y-z-notification-services
composer update
php artisan migrate
php artisan serve
``` 
### APIs 

|Method| endpoint |
|------|---------|
|POST|api/signup|
|POST|api/login|
|POST|api/subscribe|
|PUT|/api/change/subscription/{subscription_id}|

