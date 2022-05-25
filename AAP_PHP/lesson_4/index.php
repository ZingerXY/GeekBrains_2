<?php

abstract class DBFactory
{
	abstract public function createDBConnection(): DBConnection;

	abstract public function createDBRecrord(): DBRecrord;

	abstract public function createDBQueryBuiler(): DBQueryBuiler;
}

class MySQLFactory extends DBFactory
{
	public function createDBConnection(): DBConnection
	{
		return new MySQLDBConnection();
	}

	public function createDBRecrord(): DBRecrord
	{
		return new MySQLDBRecrord();
	}

	public function createDBQueryBuiler(): DBQueryBuiler
	{
		return new MySQLDBQueryBuiler();
	}
}

class PostgreSQLFactory extends DBFactory
{
	public function createDBConnection(): DBConnection
	{
		return new PostgreSQLDBConnection();
	}

	public function createDBRecrord(): DBRecrord
	{
		return new PostgreSQLDBRecrord();
	}

	public function createDBQueryBuiler(): DBQueryBuiler
	{
		return new PostgreSQLDBQueryBuiler();
	}
}

class OracleFactory extends DBFactory
{
	public function createDBConnection(): DBConnection
	{
		return new OracleDBConnection();
	}

	public function createDBRecrord(): DBRecrord
	{
		return new OracleDBRecrord();
	}

	public function createDBQueryBuiler(): DBQueryBuiler
	{
		return new OracleDBQueryBuiler();
	}
}

abstract class DBConnection
{
	abstract public function connect($db_host, $db_port, $db_dbname, $db_user, $db_pass);
}

class MySQLDBConnection extends DBConnection
{
	public function connect($db_host, $db_port, $db_dbname, $db_user, $db_pass)
	{
		return "connect to MySQLDB $db_host, $db_port, $db_dbname";
	}
}

class PostgreSQLDBConnection extends DBConnection
{
	public function connect($db_host, $db_port, $db_dbname, $db_user, $db_pass)
	{
		return "connect to PostgreSQL $db_host, $db_port, $db_dbname";
	}
}

class OracleDBConnection extends DBConnection
{
	public function connect($db_host, $db_port, $db_dbname, $db_user, $db_pass)
	{
		return "connect to OracleDB $db_host, $db_port, $db_dbname";
	}
}

abstract class DBRecrord
{
	abstract public function record();
}

class MySQLDBRecrord extends DBRecrord
{
	public function record() {
		return 'record to MySQLDB';
	}
}

class PostgreSQLDBRecrord extends DBRecrord
{
	public function record()
	{
		return 'record to PostgreSQL';
	}
}

class OracleDBRecrord extends DBRecrord
{
	public function record()
	{
		return 'record to OracleDB';
	}
}

abstract class DBQueryBuiler
{
	abstract public function queryBuiler();
}

class MySQLDBQueryBuiler extends DBQueryBuiler
{
	public function queryBuiler()
	{
		return 'queryBuiler to MySQLDB';
	}
}

class PostgreSQLDBQueryBuiler extends DBQueryBuiler
{
	public function queryBuiler()
	{
		return 'queryBuiler to PostgreSQLDB';
	}
}

class OracleDBQueryBuiler extends DBQueryBuiler
{
	public function queryBuiler()
	{
		return 'queryBuiler to OracleDB';
	}
}

function clientCode(DBFactory $DBfactory)
{

	$connectDB = $DBfactory->createDBConnection();
	$recordDB = $DBfactory->createDBRecrord();
	$queryBuilerDB = $DBfactory->createDBQueryBuiler();

	echo $connectDB->connect('localhost', '1433', 'dbname', 'user', 'pass') . "<br>";
	echo $recordDB->record() . "<br>";
	echo $queryBuilerDB->queryBuiler() . "<br>";
}

/**
 * Клиентский код может работать с любым конкретным классом фабрики.
 */
echo "Client: Testing client code with the first factory type:<br>";
clientCode(new MySQLFactory());

echo "\n";

echo "Client: Testing the same client code with the second factory type:<br>";
clientCode(new PostgreSQLFactory());

echo "\n";

echo "Client: Testing the same client code with the second factory type:<br>";
clientCode(new OracleFactory());