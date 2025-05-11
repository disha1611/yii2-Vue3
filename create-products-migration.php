// create-products-migration.php
<?php
use yii\db\Migration;

class m240601_000000_create_products_table extends Migration
{
    public function up()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'price' => $this->decimal(10,2)->notNull(),
            'description' => $this->text(),
            'category_id' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->batchInsert('products', 
            ['name', 'price', 'description'],
            [
                ['Premium Laptop', 1499.99, 'Business-grade laptop'],
                ['Ergonomic Mouse', 59.95, 'Wireless ergonomic mouse'],
                ['Mechanical Keyboard', 129.50, 'RGB gaming keyboard'],
            ]
        );
    }

    public function down()
    {
        $this->dropTable('products');
    }
}