
# Setup

### Clone the project
```
git clone https://github.com/makmacedo/contact-manager.git
```
### Set environment variables defining database details and initial user credentials.
```
cp .env.example .env
```
### create Application Key.
```
php artisan key:generate
```
### Install composer dependencies
```
composer install
```
### Migrate and Seed database
```
php artisan migrate --seed
```
### Serve local aplication
```
php artisan serve
```

# API-Routes

| Method    | URI                                                    | Action                                          |
| --------- | ------------------------------------------------------ | ----------------------------------------------- |
| GET/HEAD  | [api/routes](#Routes)                                  | App\Http\Controllers\Controler@routes           |
| POST      | [api/login](#Login)                                    | App\Http\Controllers\AuthController@login       |
| GET/HEAD  | [api/logout](#Logout)                                  | App\Http\Controllers\AuthController@logout      |
| POST      | [api/register](#Store-user)                            | App\Http\Controllers\UserController@store       |
| GET/HEAD  | [api/user](#Auth-user)                                 | App\Http\Controllers\UserController@show        |
| GET/HEAD  | [api/company](#All-companies)                          | App\Http\Controllers\CompanyController@index    |
| GET/HEAD  | [api/company/{company_id}/contacts](#Company-contacts) | App\Http\Controllers\CompanyController@contacts |
| GET/HEAD  | [api/contact](#Contacts-list)                          | App\Http\Controllers\ContactController@index    |
| POST      | [api/contact](#Store_contact)                          | App\Http\Controllers\ContactController@store    |
| POST      | [api/search](#Search)                                  | App\Http\Controllers\ContactController@search   |
| GET/HEAD  | [api/contact/{contact_id}](#Single-contact)            | App\Http\Controllers\ContactController@show     |
| PUT/PATCH | [api/contact/{contact_id}](#Edit-contact)              | App\Http\Controllers\ContactController@update   |
| DELETE    | [api/contact/{contact_id}](#Delete-contact)            | App\Http\Controllers\ContactController@destroy  |

------------------

## [Routes](#Routes)
*GET* `api/routes` retrieve the [list of api routes](#API-Routes).

## [Login](#Login)
*POST* `api/login` autehnticate user based on credentials sent over form fields, and retrieve a [API token](#API-Token) necessary to necessary to interact with other API end-point

| Field name  | Type   | Requiered |
| ----------- | ------ |:---------:|
| email       | string |    yes    |
| password    | string |    yes    |

## [Logout](#Logout)
*POST* `api/logout` revoke authenticated user [API token](#API-Token).

## [Store-user](#Store-user)
*POST* `api/register` store a new user based on form fiels and rules below

| Field name           | Type   | Requiered | Observation      |
| -------------------- | ------ |:---------:| ---------------- |
| name                 | string |    yes    |                  |
| email                | string |    yes    | email format     |
| password             | string |    yes    |                  |
| password_confimation | string |    yes    | same as password |

## [Auth-user](#Auth-user)
*GET* `api/user` retrieve the authenticated user informations.

## [All-companies](#All-companies)
*GET* `api/company` 
shows a list off all companies.

## [Company-contacts](#Company-contacts)
*GET* `api/company/{company_id}/contacts` 
shows a company list of contacts identifing company by id in URI first parameter.

## [Contacts-list](#Contacts-list)
*GET* `api/contact` 
show a paginated list of contacts
- acxept an optional query parameter `limit` that define the amout of contacts per page, (`limit` is 10 by default and can assume other value or *all*)
- accept an optional query parameter `page` that define the current page of contacts. 

## [Store-contact](#Store-contact)
*POST* `api/contact` store a new contact based on form fiels and rules below

| Field name  | Type   | Requiered | Observation    |
| ----------- | ------ |:---------:| -------------- |
| first_name  | string |    yes    |                |
| last_name   | string |    yes    |                |
| middle_name | string |    no     |                |
| gender      | string |    no     | male or female |
| title       | string |    no     | max 20 char    |
| phone       | string |    no     | max 30 char    |
| mobile      | string |    yes    | max 30 char    |
| email       | string |    yes    | must be unique |
| notes       | text   |    no     |                |
| company_id  | string |    yes    | must exits     |

## [Search](#Search)

*POST* `api/search` search by name companies or contacts based in partial string match with form field `term` 

| Field name  | Type   | Requiered |
| ----------- | ------ |:---------:|
| term        | string |    yes    |

## [Single-contact](#Single-contact)
*GET* `api/contact/{contact_id}` retrieve a single contact identified by *contact_id* in URI

## [Edit-contact](#Edit-contact)
*PATCH* `api/contact/{contact_id}` update a contact identified by *contact_id* in URI from form fields and rules below

| Field name  | Type   | Requiered | Observation    |
| ----------- | ------ |:---------:| -------------- |
| first_name  | string |    no     | not null       |
| last_name   | string |    no     | not null       |
| middle_name | string |    no     |                |
| gender      | string |    no     | male or female |
| title       | string |    no     | max 20 char    |
| phone       | string |    no     | max 30 char    |
| mobile      | string |    no     | max 30 char    |
| email       | string |    no     | same or unique |
| notes       | text   |    no     |                |
| company_id  | string |    no     | must exits     |

## [Delete-contact](#Delete-contact)
*DELETE* `api/contact/{contact_id}` delete a single contact identified by *contact_id* in URI

# API-Token

When user authenticates with the right credentials using [login route](#Login)
a **Token** is retrieved, this is a Bearer token necessary to atuthenticate and use any other route, other than [login route](#Login) and [routes list](#Routes).

-------------

An API resources file in *Insomnia v4* format is available in `/storage/api_resources_insomnia.yaml`

-------------

:octocat: [Arcadio Macedo](https://github.com/makmacedo)
