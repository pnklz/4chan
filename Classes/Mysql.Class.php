<?php
/**
* Mysql class copyright (c) RSully - www.r-sully.com
* 	By using this code you agree you will keep the above copyright and this message
*/

/**
 * 
 *
 * @author EpicDewd
 * @version 1.0
 * @copyright HalpMeh, 11 November, 2010
 * @package 4chan
 **/
class Mysql
{
        private $username, $password, $host, $db;
        protected $queryAmount;
        private $sqlObject;
        function __construct($username = 'root', $password = '', $db = '', $host = 'localhost', $port = 3306)
        {
                $this->debug_write('Created. Setting variables');
                $this->setUsername($username);
                $this->setPassword($password);
                $this->setDb($db, false);
                $this->setHost($host, $port, false);
                if($this->testConn() === true)
                        $this->connect();
                else
                        return false;
        }
        function __destruct()
        {
                $this->debug_write('Bye bye!');
                echo $this->debugMsg;
                $this->disconnect();
        }
        public function checkConnection($reconn = true)
        {
                $this->debug_write('Checking connection');
                if(@mysql_ping($this->sqlObject) === true)
                {
                        $this->debug_write('Connection is here.');
                        return true;
                }
                else if($reconn == true)
                {
                        $this->debug_write('No connection, reconnecting');
                        $this->connect();
                        return $this->checkConnection(false);
                }
                else
                {
                        $this->debug_write('No connection');
                        return false;
                }
        }
        public function reconnect()
        {
                $this->debug_write('Reconnecting');
                if($this->checkConnection(false))
                        $this->disconnect();
                $this->connect();
                return true;
        }
        public function testConn()
        {
                $this->debug_write('Testing connection');
                $test = @mysql_connect($this->host, $this->username, $this->password);
                if(@mysql_ping($test) === true)
                {
                        $this->debug_write('Test connection works');
                        @mysql_close($test);
                        $test = null;
                        return true;
                }
                $test = null;
                return false;
        }
        public function connect()
        {
                $this->debug_write('Connecting');
                if($this->checkConnection(false))
                        return true;
                $this->sqlObject = mysql_connect($this->host, $this->username, $this->password);
                mysql_select_db($this->db, $this->sqlObject);
        }
        public function disconnect()
        {
                $this->debug_write('Disconnecting');
                if($this->checkConnection(false))
                        mysql_close($this->sqlObject);
        }
        // QUERY FUNCTIONS
        public function query($query)
        {
                $this->debug_write('Querying: ' . $query);
                $this->checkConnection();
                $this->queryAmount++;
                return mysql_query($query, $this->sqlObject);
        }
        public function num_rows($result)
        {
                $this->debug_write('Getting num rows');
                $this->checkConnection();
                return mysql_num_rows($result);
        }
        public function num_rows_from_query($query)
        {
                $this->debug_write('Getting num rows from ' . $query);
                $this->checkConnection();
                $result = $this->query($query);
                return $this->num_rows($result);
        }
        public function fetch_array($result)
        {
                $this->debug_write('Getting array');
                $this->checkConnection();
                return mysql_fetch_array($result, MYSQL_BOTH);
        }
        public function fetch_array_from_query($query)
        {
                $this->debug_write('Getting array from ' . $query);
                $this->checkConnection();
                $result = $this->query($query);
                return $this->fetch_array($result);
        }
        // Extra:
        public function safe($string)
        {
                $this->debug_write('Making (' . $string . ') safe.');
                if($this->checkConnection())
                        return mysql_real_escape_string($string);
                else
                        $this->connect();
                return mysql_real_escape_string($string, $this->sqlObject);
        }
        public function getMysqlObject()
        {
                $this->debug_write('Getting sql object');
                return $this->sqlObject;
        }
        // Setters
        public function setUsername($un)
        {
                $this->username = $un;
        }
        public function setPassword($pw)
        {
                $this->password = $pw;
        }
        public function setHost($host, $port = 3306, $conn = true)
        {
                $this->host = $host . ':' . $port;
                if($conn === true)
                        $this->reconnect();
        }
        public function setDb($db, $conn = true)
        {
                $oldDb = $this->db;
                $this->db = $db;
                if(($db != $oldDb) && $conn == true)
                        $this->reconnect();
        }
        // Gettpls
        public function queryAmount()
        {
                $this->debug_write('Requesting query amount: ' . $this->queryAmount);
                return $this->queryAmount;
        }
        // DEBUG
        private $debug = false, $debugMsg = '';
        private function debug_write($text)
        {
                if($this->debug)
                {
                        $this->debugMsg .= "\n" . '<div class="mysql debug">[MYSQL][DEBUG] ' . $text . '<br /></div>' . "\n";
                }
        }
        public function enable_debug()
        {
                $this->debug = true;
                $this->debug_write("Debug plis");
        }       
}
?>