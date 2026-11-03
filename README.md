<<<<<<< HEAD
# Paynext (Laravel 12)

Paynext marketing site + Cashnext-style earning dashboard, converted to Laravel.

## Setup
```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite      # default DB is SQLite; or set DB_* in .env for MySQL
php artisan migrate --seed
php artisan serve
```
Requires PHP 8.2+.

## Logins (seeded; change them!)
| Role  | Email              | Password |
|-------|--------------------|----------|
| Admin | admin@paynext.com  | password |
| User  | demo@paynext.com   | password |

## What is conditional / role-based
- Guests are redirected to **/login** when opening the navbar **Dashboard** button; logged-in users go straight in.
- Suspended users cannot log in and are logged out on their next request.
- **Admins** additionally see: Add New / Edit / Delete on Offerwalls and Tasks, inactive items, and the Admin menu (Withdrawals, Users, Tickets).
- Withdraw needs: balance >= minimum, valid method, amount <= balance. A request moves the money Balance -> Pending; admin **Approve** completes it, **Reject** refunds it.
- Referrals: signup via `/register?ref=CODE` pays the referrer a bonus, plus a % commission on that user's later offer/task earnings (see `config/earning.php`).
- Tasks can be completed once per user. Offer completions are idempotent per `txn_id`.

## Demo mode (works out of the box)
With `DEMO_OFFERS=true` (default in `.env.example`, and when `APP_ENV=local`), **Start Earning** on an offerwall with no URL opens sample offers that credit points instantly, so you can test balance, withdrawals, referral commission and transactions. **Set `DEMO_OFFERS=false` in production.**
Admins can also add/remove points per user from Admin -> Users.

## Referral code
Each user gets a code at signup. In **Profile** they can edit it (4-16 letters/numbers/dashes, must be unique) or click **Generate new**. Changing it changes their referral link.

## Connecting offerwalls
1. Admin -> Offerwalls -> Edit: set the wall's URL, using `{user_id}` for the user's ID.
2. Put the postback URL shown on that edit page into the network's dashboard, and set `OFFERWALL_POSTBACK_SECRET` in `.env`:
   `/postback/{slug}?user_id={user_id}&points={points}&txn_id={txn_id}&secret=...`
   (Parameter names differ by network; map them as needed in `PostbackController`.)

## Email (forgot password)
`MAIL_MAILER=log` by default: the reset link is written to `storage/logs/laravel.log`. Configure SMTP in `.env` for real emails.

## Notes
- Contact-form submissions are stored in the `contact_messages` table.
- "Mark as Completed" on tasks is honor-based; add your own verification if tasks must be proven.
- Public assets live in `public/assets`.
=======
# Paynext_React_Laravel
>>>>>>> f62ca57758ca699aa3b022c4371fb204ad67587d
