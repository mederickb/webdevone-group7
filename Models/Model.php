<?php
/**
 * Parent model class
 */
class Model extends DB\SQL\Mapper {

    protected $db; // database connection
    /**
     * @var mixed
     */
    private $id;

    public function __construct($f3, $table) {
        $this->db = new DB\SQL(
            'mysql:host=localhost;port=8889;dbname=fsd12_07',
            'root',
            'root'
        );

        // create mapper of given table
        parent::__construct($this->db, $table);
    }

    /**
     * Get all the rows in the table
     * @return Object database results
     */
    public function getAll() {
        $this->load();
        return $this->query;
    }

    /**
     * Get a single value from the table using a specified field and value
     * @param string $field the name of the column to search by
     * @param mixed $value The value to search for
     * @return Object database results, or false if not found
     */
    public function getByField($field, $value) {
        $this->load([$field . ' = ?', $value]);
        return $this->loaded() ? $this->cast() : false;
    }

    /**
     * Create a new row into the table 
     * @param array $data Associative array of data to insert
     * @return int last inserted ID
     */
    public function create($data) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
        $this->save();
        return $this->id;
    }

    /**
     * Update existing $id row from our table 
     * @param int ID of the row to edit
     */
    public function updateById($id) {
        $this->load(['$id => ?', $id]);
        $this->copyfrom('POST');
        $this->update();
    }

    /**
     * Delete a row from the table using the `id` primary key
     * @param int ID of row to delete
     */
    public function deleteById($id) {
        $this->load(['id = ?', $id]);
        if ($this->loaded()) {
            $this->erase();
            return true;
        }
        return false;
    }

    /**
     * Insert new row into table using POST data
     * @return int Last inserted ID
     */
    public function addItem() {
        $this->copyfrom('POST');
        $this->save();

        return $this->id; // last inserted ID
    }

    /**
     * Fetch a value from the table using an id
     * @param int $id ID of row
     * @return Object database result
     */
    public function fetchById($id) {
        return $this->findone(['id = ?', $id]);
    }
}