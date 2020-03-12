# Studee Code Challenge API

This setup of Docker, Lumen micro-framework, Nginx and MySQL uses docker-compose to setup the application services.

## Technologies
   
1. PHP - programming language
2. Lumen - a PHP micro-framework, which is a leaner version of Laravel was chosen for this task.
3. MySQL - data stored in denormalized  database tables
4. Docker 
   
   
## Steps

1. Clone this repository e.g.

   ```bash
   git clone https://github.com/saada/docker-lumen.git dakala
   ```

2. Enter the new directory with the cloned code e.g.

   ```bash
   cd dakala
   ```

3. Build and run the containers

   ```bash
   docker-compose -p dakala up --build -d
   ```

   The `-p` option defines the project name else, it will default to the directory name. If cloned into the default or another directory this command needs to be adjusted.

4. Enter the PHP container to run a couple of commands for Lumen

   ```bash
   docker exec -it dakala_php_1 /bin/sh
   ```

5. Inside the container run:

   ```bash
   cd ..
   php artisan migrate:refresh --seed
   ```
   The `artisan` command provided by Lumen/Laravel needs to be run from the root of the application for this demo. It creates MySQL database tables and migrates data from CSV file into them.

6. Use the API with your favourite HTTP client e.g. Postman

7. When done, exit the container and stop all containers with:

   ```bash
   exit
   docker-compose down
   ```

8. How was it for you? :-)


## Database models

![image](models.png)


## Routes

The application provides the following routes:

+----------+---------------------------------------------------+--------------------------------------------------------------------------+
| Method   | URI                                               | Action                                                                   |
+----------+---------------------------------------------------+--------------------------------------------------------------------------+
| POST     | classes                                           | App\Http\Controllers\ClassificationController@create                     |
| GET|HEAD | classes                                           | App\Http\Controllers\ClassificationController@index                      |
| GET|HEAD | classes/{classId}/commodities                     | App\Http\Controllers\CommodityController@commoditiesByClassId            |
| GET|HEAD | classes/{id}                                      | App\Http\Controllers\ClassificationController@show                       |
| PUT      | classes/{id}                                      | App\Http\Controllers\ClassificationController@update                     |
| DELETE   | classes/{id}                                      | App\Http\Controllers\ClassificationController@destroy                    |
| POST     | commodities                                       | App\Http\Controllers\CommodityController@create                          |
| GET|HEAD | commodities                                       | App\Http\Controllers\CommodityController@index                           |
| GET|HEAD | commodities/{id}                                  | App\Http\Controllers\CommodityController@show                            |
| DELETE   | commodities/{id}                                  | App\Http\Controllers\CommodityController@destroy                         |
| PUT      | commodities/{id}                                  | App\Http\Controllers\CommodityController@update                          |
| GET|HEAD | families                                          | App\Http\Controllers\FamilyController@index                              |
| POST     | families                                          | App\Http\Controllers\FamilyController@create                             |
| GET|HEAD | families/{familyId}/classes                       | App\Http\Controllers\ClassificationController@classesByFamilyId          |
| GET|HEAD | families/{familyId}/classes/{classId}/commodities | App\Http\Controllers\CommodityController@commoditiesByFamilyIdAndClassId |
| GET|HEAD | families/{id}                                     | App\Http\Controllers\FamilyController@show                               |
| PUT      | families/{id}                                     | App\Http\Controllers\FamilyController@update                             |
| DELETE   | families/{id}                                     | App\Http\Controllers\FamilyController@destroy                            |
| POST     | segments                                          | App\Http\Controllers\SegmentController@create                            |
| GET|HEAD | segments                                          | App\Http\Controllers\SegmentController@index                             |
| PUT      | segments/{id}                                     | App\Http\Controllers\SegmentController@update                            |
| GET|HEAD | segments/{id}                                     | App\Http\Controllers\SegmentController@show                              |
| DELETE   | segments/{id}                                     | App\Http\Controllers\SegmentController@destroy                           |
| GET|HEAD | segments/{segmentId}/families                     | App\Http\Controllers\FamilyController@familiesBySegmentId                |
+----------+---------------------------------------------------+---------------------------------------------------------------------------


## TODOS?

- No authentication, validation, exception-handling or unit tests 
- No query parameters, fields, filters or links for the API

