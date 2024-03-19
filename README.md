Car4Sure
==========

# Features
- CI/CD to Fly.io
- Uses SQLite as Database in Production
- Login and Sign Up
- Full Text Search
- CRUD a Policy with its drivers, policy holder, vehicles and its coverages
- Download a Policy in PDF
- Roles & Permissions
- Scopes - where Customers only sees policies assigned to them
- API endpoints (Using OAuth2 for Third Party Connection)
  - `/api/v1/policies/`

## How it works

- This project is an internal tool to allow insurance Car4Sure to manage policies.
- A customer can sign up or sign in to the website and have an account.
- A policy manager can create any policies, and assign it to to any customer.
- A customer can **only** view their policies (a policy can be assigned to multiple users)
- A policy manager can change any policy.
- API endpoints uses OAuth2 with Client Credentials/Password Grant.
  - Client Credentials allows machine to machine interactions Ex. A third Party - A business partner.
  - Password Grant allows any users to retrieve database based on their priviledge and perform actions too.

### Roles
We have 3 types of users
- Customers, they are allowed to view only their policies and download them.
- Policy Makers/Managers are allowed to create update and delete policies.
- Admins are allowed to do everything + They can create Client Credentials And Password Grants. (No UI done will need to do it via CLI)


### Why it works like this ?

Care4sure is an insurance company, it should not allow any users to modify their data. Maybe an implementation is to make a policy commentable, and versionable, so that when a customer comments
on a policy, both users and policy makers are able to view history of a specific policy and history of comments. So, this allows transparency and protection against unwanted change.

### Why PolicyHolder is not a User Model why is it its own model ?
Not sure if the policy holder should be part of the system. Example; Let's say a user never connects to the app. Should that user has a "ghost account" since it is created behind the scene by a policy maker. Same thing for drivers. They are their own models. More flexiblity (as a developer).

Duplicate data ? Possible, but storage is cheap. We can always connect the dots with the users'name or their national id number.


### Live version

Login at: `https://iplatform.fly.dev`

Users available (same as Local):

`iamthenight@gmail.com` (super admin - same as policy maker, didn't add more features for this user.)
`ilovecakes@gmail.com` (policy maker)
`anybody@gmail.com` (customer)
`anybody2@gmail.com` (customer)
`anybody3@gmail.com` (customer)

All has `password` as password. You can also register at:

`https://iplatform.fly.dev/register` if you want to but you will have no data.


To interact with API:

Client ID: `1`
Client Secret: `LuntU1QxcYuBk4Ru110pUTGhfErctEfWxRyuTGYU`

```
curl --request POST \
  --url https://iplatform.fly.dev/oauth/token \
  --header 'Content-Type: application/x-www-form-urlencoded' \
  --data grant_type=client_credentials \
  --data client_id=1 \
  --data client_secret=fQjVPxrQTSUmwfExFZK7tU1WmxE1IlRreJjrPmAD
```
Use `Bearer Token`:

```csv
  GET    api/v1/policies 
  POST   api/v1/policies
  GET    api/v1/policies/{policy}
  PUT    api/v1/policies/{policy}
  DELETE api/v1/policies/{policy}
  GET    api/v1/policies/{policy}/drivers
  POST   api/v1/policies/{policy}/drivers
  GET    api/v1/policies/{policy}/drivers/{driver}
  PUT    api/v1/policies/{policy}/drivers/{driver}
  DELETE api/v1/policies/{policy}/drivers/{driver}
  GET    api/v1/policies/{policy}/policy-holder
  POST   api/v1/policies/{policy}/policy-holder
  GET    api/v1/policies/{policy}/policy-holder/{policy_holder}
  PUT    api/v1/policies/{policy}/policy-holder/{policy_holder}
  DELETE api/v1/policies/{policy}/policy-holder/{policy_holder}
  GET    api/v1/policies/{policy}/vehicles
  POST   api/v1/policies/{policy}/vehicles
  GET    api/v1/policies/{policy}/vehicles/{vehicle}
  PUT    api/v1/policies/{policy}/vehicles/{vehicle}
  DELETE api/v1/policies/{policy}/vehicles/{vehicle}
  GET    api/v1/vehicles/{vehicle}/coverages
  POST   api/v1/vehicles/{vehicle}/coverages
  GET    api/v1/vehicles/{vehicle}/coverages/{coverage}
  PUT    api/v1/vehicles/{vehicle}/coverages/{coverage}
  DELETE api/v1/vehicles/{vehicle}/coverages/{coverage}
```
### Local Testing

Use Laravel Herd or Laravel Valet or Use the docker-compose.

- `php artisan passport:keys` # This generate pub and private keys for API.

if you want to generate a keypair manually:

```sh
openssl genpkey -algorithm RSA -out oauth-private.key -pkeyopt rsa_keygen_bits:2048
openssl rsa -pubout -in oauth-private.key -out oauth-public.key
```

- `php artisan passport:client` # This generate Client ID and Client Secret Used for Authentication

API Usage:
- To generate `Bearer token`

```sh
curl --request POST \
  --url http://iplatform.test/oauth/token \
  --header 'Content-Type: application/x-www-form-urlencoded' \
  --data grant_type=client_credentials \
  --data client_id=$CLIENT_ID \
  --data client_secret=$CLIENT_SECRET
  # You can copy paste this into any API Client (Postman/Insomnia or HTTPie it will generate the format for you!)
  # iplatform.test be your localhost:8000 or anything I use Laravel Herd which is very useful.
```

where `$CLIENT_ID` and `$CLIENT_SECRET` comes from `php artisan passport:client`

Afterwards, head to the commandline, and run:

```sh
php artisan route:list | grep api/v1
```

You will get a list of API endpoints to call. In case there is no data.

Reset Database

```sh
php artisan migrate:fresh --seed
```

This will create some fake data. It will also create 2 testing users for login purposes.




