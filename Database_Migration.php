// backend/migrations/m240601_153000_create_products_table.php
class m240601_153000_create_products_table extends \yii\db\Migration
{
    public function up()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'price' => $this->decimal(10,2)->notNull(),
            'description' => $this->text(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        // Test data
        $this->batchInsert('product', ['name', 'price', 'description'], [
            ['Laptop Pro', 1299.99, 'High-end business laptop'],
            ['Wireless Mouse', 49.95, 'Ergonomic Bluetooth mouse'],
            ['Mechanical Keyboard', 89.50, 'RGB gaming keyboard'],
        ]);
    }

    public function down()
    {
        $this->dropTable('product');
    }
}