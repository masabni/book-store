<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('products', function(Blueprint $table)
		{
			$table->foreign('author_role_id', 'FK_product_author_roles')->references('id')->on('author_roles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('author_id', 'FK_product_authors')->references('id')->on('authors')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('category_id', 'FK_product_categories')->references('id')->on('categories')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('cover_type_id', 'FK_product_cover_types')->references('id')->on('cover_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('product_size_id', 'FK_product_product_sizes')->references('id')->on('product_sizes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('product_type_id', 'FK_product_product_types')->references('id')->on('product_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('publisher_role_id', 'FK_product_publisher_roles')->references('id')->on('publisher_roles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('publisher_id', 'FK_product_publishers')->references('id')->on('publishers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('sub_category_id', 'FK_product_sub_categories')->references('id')->on('sub_categories')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('products', function(Blueprint $table)
		{
			$table->dropForeign('FK_product_author_roles');
			$table->dropForeign('FK_product_authors');
			$table->dropForeign('FK_product_categories');
			$table->dropForeign('FK_product_cover_types');
			$table->dropForeign('FK_product_product_sizes');
			$table->dropForeign('FK_product_product_types');
			$table->dropForeign('FK_product_publisher_roles');
			$table->dropForeign('FK_product_publishers');
			$table->dropForeign('FK_product_sub_categories');
		});
	}

}
