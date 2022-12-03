<b>Recrutation task - graphql api in Symfony</b><br>

This project contains simple CRUDE graphql api build in Symfony framework according to recrutation task.<br>
<br>
operating system Ubuntu 22.04.1<br>
<br>
PHP version 8.2.2<br>
<br>
Symfony version 6.1<br>
<br>
Database localy in Mysql version 8.0.31<br>
<br>
Composer version 2.4.4<br>
<br>

Api can create, read, update and delete data from database. Database has three fields in table:<br>
- id - prmiary key - intiger<br>
- brand_name - name of the car brand - string<br>
- year - year of established of car brand - intiger<br>
All fields are non-nullabel.<br>
Api can be tested by GraphiQL localy http://127.0.0.1:8000/graphiql<br>
<br>
Querys and mutations for graphql:<br>

- query for single car brand:<br>
query RootQuery {<br>
   carbrand(id:1) {<br>
     brand_name<br>
     year<br>
   }<br>
<br>
- query for all car brands:<br>
query RootQuery<br>
   carbrands {<br>
     id<br>
     brand_name<br>
     year<br>
   }<br>
}<br>
<br>
- mutation for create car brand:<br>
mutation RootMutation {<br>
 	createCarBrand(carbrand: {<br>
     brand_name:"Maserati"<br>
     year:1914<br>
   }) {<br>
 	  id<br>
     brand_name<br>
     year<br>
 	}<br>
}<br>
<br>
- mutation for update car brand:<br>
mutation RootMutation {<br>
	updateCarBrand(id:2, carbrand: {<br>
    brand_name:"Bentley"<br>
    year: 1919<br>
  }) {<br>
	  id<br>
    brand_name<br>
    year<br>
	}<br>
}<br>
<br>
-mutation for delete car brand:<br>
mutation RootMutation {<br>
 	deleteCarBrand(id:2) {<br>
 	  id<br>
 	}<br>
 }<br>
<br>
Graphql files are in directory config/graphql/types<br>
Resolver php file in directory src/Resolver<br>
Query service and mutation service php files in drectory src/Service
