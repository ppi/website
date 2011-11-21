	<h2 id="inserting-data">Using Your Connection - Inserting Data <a href="#inserting-data" class="anchor" title="Inserting Data">¶</a></h2>
	<p>When inserting data you specify the table you're inserting into and the data itself. The data is in the format of an associative array. You do not need to escape or sanitize the data in any way it is done for you.</p>
	<pre><code class="php">
$connection->insert('my_table', array(
    'name'   => 'dragoonis',
    'age'    => 24,
    'gender' => 'male'
));
	</code></pre>

		<h2 id="updating-data">Using Your Connection - Updating Data <a href="#updating-data" class="anchor" title="Updating Data">¶</a></h2>
	<p>When updating data you have to specify three separate parameters. The first is the table name you're updating. The second is the data to be updated and the third contains the fields that you're updating.</p>
	<pre><code class="php">
$data = array(
    'active'       => 1,
    'updated_time' => time()
);
$where = array(
    'user_id' => 50245
);
$connection->update('my_table', $data, $where);
	</code></pre>


	<h2 id="deleting-data">Using Your Connection - Deleting Data <a href="#deleting-data" class="anchor" title="Deleting Data">¶</a></h2>
	<p>When deleting records from your table you must specify the table to delete from and the clause which applies to your delete operation. The delete clause is an associateve array containing column-value pairs.</p>
	<pre><code class="php">
// Delete all 30 year old males
$connection->delete('my_table', array(
	'age'    => '30',
	'gender' => 'male'
));
	</code></pre>


	<h2 id="recap-1">Recap <a href="#recap-1" class="anchor" title="Recap 1">¶</a></h2>
	<p>So far we have learned how to register and load up connections as well as insert, update and delete records from tables. Once we perform an operation you want to close your connection to free up resources to the database. Consider the following example:</p>
	<pre><code class="php">
// Load our connection
$connection = $ds->getConnection('my_connection_key');

// Insert
$connection->insert('users', array(
    'username' => 'dragoonis',
    'fname'    => 'paul',
    'lname'    => 'dragoonis'
));

// Update
$updateData  = array('username' => 'pdragoonis');
$updateWhere = array('username' => 'dragoonis');
$connection->update('users', $updateData, $updateWhere);

// Delete
$deleteWhere = array('username' => 'pdragoonis');
$connection->delete('users', $deleteWhere);

	</code></pre>

	<h2 id="selecting-data">Using Your Connection - Selecting Data <a href="#selecting-data" class="anchor" title="Selecting Data">¶</a></h2>
	<p>Now we need to get data out of our table, when we execute a query we are returned a PDOStatment object that we fetch our rows from.</p>
	
	<pre><code class="php">
// Load Connections
$connection = $ds->getConnection('my_connection_key');

// Fetch all active users
$query       = "SELECT * FROM users WHERE active = 1";
$statement   = $connection->query($query);
$activeUsers = $statement->fetchAll(\PDO::FETCH_ASSOC);

// Fetch all male users
$query     = "SELECT * FROM users WHERE gender = 'male'";
$statement = $connection->query($query);
$maleUsers = $statement->fetchAll(\PDO::FETCH_ASSOC);

	</code></pre>

	<h2 id="selecting-data-binding-params">Using Your Connection - Selecting Data (Binding Params) <a href="#selecting-data-binding-params" class="anchor" title="Selecting Data Binding Params">¶</a></h2>
	<p>This is the same concept as above however it had no parameters being passed and no data required sanitizing. The bindValue approach here is using numerical placements, so the first question mark gets replaced with the value passed through bindValue() at position 1.</p>
	<br>
	<p>The reason we use parameter binding instead of traditionally putting the value directly into the query is that the latter method allows for the posibility of SQL Injection. The former (binding) completely separates the data (params) from the query allowing the params to be individually accurately sanitized before being included into the query.</p>
	<pre><code class="php">
// Load
$connection = $ds->getConnection('my_connection_key');
$userID     = 7868;

// Fetch our user data by user id.
$query       = "SELECT * FROM users WHERE user_id = ?";
$statement   = $connection->prepare($query);
$statement->bindValue(1, $userID);
$user        = $statement->fetch(\PDO::FETCH_ASSOC);

// Fetch all active users who use chose php as their language
$active       = 1;
$query        = "SELECT * FROM users WHERE active = ? AND language = ?";
$statement    = $connection->prepare($query);
$statement->bindValue(1, $active);	
$statement->bindValue(2, 'php');
$statement->execute();
$users        = $statement->fetchAll(\PDO::FETCH_ASSOC);

// Same as above but we skip bindValue() and pass our params to execute() 
$active       = 0;
$query        = "SELECT * FROM users WHERE active = ? AND language = ?";
$statement    = $connection->prepare($query);
$params       = array(
    1 => $active,
    2 => 'php'
);

$statement->execute($params);
$users = $statement->fetchAll(\PDO::FETCH_ASSOC);
	</code></pre>


	<h2 id="selecting-data-binding-named-params">Using Your Connection - Selecting Data (Binding Named Params) <a href="#selecting-data-binding-named-params" class="anchor" title="Selecting Data Binding Named Params">¶</a></h2>
	<p>The difference between this example and the previous is that we no longer use question marks as the placeholders, instead we use names to refer to a placeholder in the query. This improves readability in the query, makes the query more maintainable and more flexible as the plaseholders are no longer bound by their position. If there was a 'best practise' recommendation on how to do PDO properly, this would be the most popular choice.</p>
	<pre><code class="php">
// Load Connection
$connection = $ds->getConnection('my_connection_key');

// Get a specific user by username
$query      = "SELECT * FROM users WHERE username = :username";
$statement  = $connection->prepare($query);
$statement->bindParam('username', $username);
$statement->execute();
$user       = $statement->fetch(PDO::FETCH_ASSOC);

// Get all male users of type 'administrator'
$query      = "SELECT * FROM users 
              WHERE user_type = :user_type AND gender = :gender";

$statement  = $connection->prepare($query);
$statement->bindParam('user_type', 'administrator');
$statement->bindParam('gender', 'male');
$statement->execute();
$users      = $statement->fetchAll(PDO::FETCH_ASSOC);

// Same as above except we pass our params to execute() and skip bindParam()
$query      = "SELECT * FROM users 
              WHERE user_type = :user_type AND gender = :gender";
		
$statement  = $connection->prepare($query);
$params     = array(
    'user_type' => 'administrator',
    'gender'    => 'male'
);
$statement->execute($params);
$users      = $statement->fetchAll(PDO::FETCH_ASSOC);

// Cleanup
$connection->close();
	</code></pre>
</div>
