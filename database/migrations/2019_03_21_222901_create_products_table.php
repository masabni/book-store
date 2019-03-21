<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('category_id')->unsigned()->index('FK_product_categories');
			$table->integer('sub_category_id')->unsigned()->nullable()->index('FK_product_sub_categories');
			$table->integer('author_id')->unsigned()->index('FK_product_authors');
			$table->integer('publisher_id')->unsigned()->index('FK_product_publishers');
			$table->integer('author_role_id')->unsigned()->index('FK_product_author_roles');
			$table->integer('publisher_role_id')->unsigned()->index('FK_product_publisher_roles');
			$table->integer('product_type_id')->unsigned()->index('FK_product_product_types');
			$table->integer('cover_type_id')->unsigned()->index('FK_product_cover_types');
			$table->integer('product_size_id')->unsigned()->nullable()->index('FK_product_product_sizes');
			$table->string('name');
			$table->string('image')->nullable();
			$table->bigInteger('selling_price')->default(0);
			$table->bigInteger('cost_price')->default(0);
			$table->bigInteger('product_weight')->nullable();
			$table->bigInteger('num_pages')->nullable();
			$table->string('isbn')->nullable();
			$table->string('barcode')->nullable();
			$table->string('edition')->nullable();
			$table->date('release_date')->nullable();
			$table->string('pdf_link')->nullable();
			$table->string('audio_file')->nullable();
			$table->text('description')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
