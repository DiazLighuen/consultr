# PHP Laravel Exercise Resolution

## Evaluation Points

* Basic programming concepts
* PHP, MySQL and Laravel knowledge 
* Data modeling

## Overall Problem
The CSV file located on `csv/superheros.csv` contains superheros that is not filtrable.

## Overall Requirement
We need an API based on laravel that allow us to retrieve superheroes.

## Exercise
We will divide the exercise in 3 parts:

1. **Data modeling:**
Define a correct structure to import the `CSV` and manage the database efficiently based on eloquent.

2. **Data import:**
Create a script to import `csv/superheros.csv` in the models database tables. No MySQL have to be provided, the script need to allow us to import the data correctly.

3. **API to retrieve data:**
Generate a API endpoint to retrieve superheroes. The endpoint need to be able to filter by GET params (three properties at least), order and paginate the results.

## Setup and Config

### Requirements
1. PHP
2. MySQL database
3. Composer


### Installation guide

1. Clone the repo:
`git clone git@github.com:DiazLighuen/consultr.git`
2. Once you cloned the repository, you will need to create a MySQL database named `consultr`
3. Setup the `exercise/.env` file
4. Execute the command: `sh scripts/install.sh`
5. Execute `php artisan serve`
6. You are ready to test the resolution.
 
## Endpoints 

### Import csv
`http://localhost:8000/api/import`

### Get heroes
`http://localhost:8000/api/heroes`

#### Optional GET params

**page**: Pagination. Values(`integer`)

**sort**: Order by parameter (default = name). Values(`ASC`,`DES`).

**orderBy**: Parameter used by sort. Values(`name`,`fullName`,`strength`,`speed`,`durability`,`power`,`combat`,`height0`,
                                          `height1`,`weight0`,`weight1`,`eyeColor`,`hairColor`,`race`,
                                          `publisher`)

**name**: Filter. Values(`string`).

**fullName**: Filter. Values(`string`).

**strength**: Filter. Values(`integer`).

**speed**: Filter. Values(`integer`).

**durability**: Filter. Values(`integer`).

**power**: Filter. Values(`integer`).

**combat**: Filter. Values(`integer`).

**height0**: Filter. Values(`string`).

**height1**: Filter. Values(`string`).

**weight0**: Filter. Values(`string`).

**weight1**: Filter. Values(`string`).

**eyeColor**: Filter. Values(`string`).

**hairColor**: Filter. Values(`string`).

**race**: Filter. Values(`string`).

**publisher**: Filter. Values(`string`).

### Visual Endpoint
`http://localhost:8000/` (same parameters as api endpoint)

## Postman Collection
`consultr.postman_collection.json`