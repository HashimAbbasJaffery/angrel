Hello this is Angrel Framework created by Hashim Abbas. By using this framework you can easily perform crud operation without writing any query. 
The demostration of this mini-framework is below

# SETUP
After installing Angrel framework you can see two folder the config and ORM. inside the config and connection.php you can see the connection which is connected   using PDO you are free to change that according to your needs. you can change servername, username, password, and database name in order to connect to your database.

After doing this step your setup will be completed and you can start working

# Add Record

you need to include crud.php inside your project. after making the object you can call insert method 

## Insert Method

Insert method accept accepts two parameters row and columns. you have to provide Column and rows of your database in Simple Array then the data will be inserted inside the database

##3 Demonstration of insert record
<pre>
<code>
$addRecord = new crud("tableName") // you have to insert your tableName here
$column = ["name, "city"];
$rows = ["Hashim", "Karachi"]
$addRecord->insert($column, $rows); // Data will be inserted
</code>
</pre>

# DELETE RECORD

Delete method accepts two parameters <code>Conditions</code> and <code>type</code>

in condition you have to give the condition in the form of 2D array like this <code>[["id", "=", "1"], ["name", "!=", "hashim]]</code>
in second parameter you have to provide type you got two options for that

1) WHERE (It will insert AND between multiple condition by default)
2) WHERE_OR (It will insert OR between multiple conditions)

The demonstration of code is below: 

<pre>
<code>
$deleteRecord = new crud("tableName");
$condition = [
  ["id", "=", "1"]
];
$deleteRecord->delete($conditions, "WHERE");

it will generate DELETE FROM tableName WHERE id = 1

you can also put multiple conditions like this:

$conditions = [
  [//condition1],
  [//condition2],
];

it will generate this query 

DELETE FROM tableName WHERE //condition AND //condition
to change AND to OR you need to put WHERE_OR in the type parameter
</code>
</pre>

# UPDATE RECORD

Update method accepts three parameters columns, type, and conditions

in column parameters you need to put column parameters which is intended to be updated and in type parameter it is same as DELETE in condition parameter you have to put condition 

<pre>
<code>
$updateRecord = new crud("tableName");
$columns = [
  "name" => "Hashim",
  "city" => "Karachi"
];
$updateRecord->update($columns, "WHERE", [["id", "=", "1"]]);
It will generate following query:
UPDATE tableName SET name = "Hashim", city = "Karachi" WHERE id = 1 
</code>
</pre>

# SELECT RECORD

the get Method accepts three parameter unlike other methods these parameters are optionals type, conditions, and columns if you want to fetch all records then leave the parameters empty So it will generate this query SELECT * FROM tableName

<pre>
<code>
$selectRecords = new crud("tableName");
$conditions = [
  ['id', '=', '1']
];
$columns = ['name', 'city'];
$results = $selectRecords->get("WHERE", $conditions, $columns);
foreach($results as $result) {
  //  APPLY LOGICS HERE
}

NOTE: YOU CAN ALSO WRITE NO PARAMETERS to fetch all records from database
</code>
</pre>
