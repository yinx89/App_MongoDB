# App_MongoDB

## Table of Contents

1. [Step-by-step explanation](#Explanation)  
2. [Challenges](#Challenges)  
 
<a name="Explanation"/>

### 1.	Step-by-step explanation

The program is connected to the MongoDB databases with the intention of collecting the data through PHP and showing them in a simple way through Vue.js in table format and JSON through the framework Bootstrap.

The Vue.js component when is created calls the getUsers function, this function tries to execute the function in function.php by passing it the arguments of the number of elements per page, the page and a stop variable that tries to check when the last available page is being displayed according to the data.

This option is the easiest to visualize the data, it is a system of pagination of the data in a table that makes the requests one by one as it interacts with the Previous and Next buttons.

These data and parameters are managed and controlled so that they are executed with the appropriate values according to the context and status through the getUsers, prev, next and change methods.

The format of representation via JSON represents a clearer idea of what is received by the server in the query executed in the tables of MongoDB.

Regarding the function-php function, it initializes the variables and through the MongoDB driver for PHP, a manager is generated, the query is carried out according to the pagination parameters and then iterating in the cursor collecting the data that have been considered interesting.

In the first place it composes the JSON with the _id key of the user, with its userId and with the number of accounts reflected by the array accounts. The savingCapacity parameter is then inserted, which is calculated by taking the sum of all the transactions associated with the user in which the totalTransactions is different from 0 to finally obtain the total of all of them. And finally an array is inserted with the _id information of all these transactions.

It would be interesting to be able to show the information of these transactions according to each user as for example the description and that when clicking it would result in a new view in which the concrete details of all of them would be obtained.

<a name="Challenges"/>

### 2.	Challenges

The first difficulty was in the choice of the technologies and languages involved and in the preparation of the environment to connect to the MongoDB tables. In order to use PHP, a local environment has been prepared through the driver for PHP and XAMPP. Subsequently, an instance of AWS EC2 had to be configured by SSH to configure this environment in depth and make it possible for the languages and technologies involved to be connected.

With the use of Vue.js the view is simplified and you get a single page experience that I was looking for.
