<?php

use yii\db\Migration;

class m161012_154539_init_page extends Migration
{

    protected $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

    public function safeUp()
    {
        $this->createTable("page", [
            'id' => $this->primaryKey(),
            'label' => $this->string(55)->notNull()->unique(),
            'title' => $this->string(55)->notNull(),
            'description' => $this->string(160)->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer(),
                ], $this->tableOptions);

        $this->createTable('route', [
            'id' => $this->integer()->notNull(),
            'path' => $this->string(1000)]
                , $this->tableOptions);

        $this->addForeignKey('fk_route', 'route', 'id', 'page', 'id', 'cascade', 'cascade');
        $this->addPrimaryKey('pk_route', 'route', 'id');

        $this->createTable("article", [
            'id' => $this->integer()->notNull(),
            'data' => $this->text()->notNull(),
                ], $this->tableOptions);
        $this->addForeignKey('fk_article', 'article', 'id', 'page', 'id', 'cascade', 'cascade');
        $this->addPrimaryKey('pk_article', 'article', 'id');



        //Simple menu abstraction
        /*
          $this->createTable('menu', [
          'id' => $this->primaryKey(),
          'uid' => $this->string(64),
          'label' => $this->string(55),
          ], $this->tableOptions);





          //Menus have links in a postion
          $this->createTable('menu_link', [
          'id' => $this->primaryKey(),
          'menu_id' => $this->integer()->notNull(),
          'position' => $this->integer()
          ], $this->tableOptions);
          $this->addForeignKey('fk_menu_link', "menu_link", "menu_id", "menu", "id", 'cascade', 'cascade');


          $this->createTable('menu_link_page', [
          'id' => $this->integer(), 'page_id' => $this->integer()
          ], $this->tableOptions);
          $this->addForeignKey('fk_menu_link_page_ref', "menu_link_page", "page_id", "page", "id", 'cascade', 'cascade');
          $this->addForeignKey('fk_menu_link_page_id', "menu_link_page", "id", "menu_link", "id", 'cascade', 'cascade');
          $this->addPrimaryKey('pk_menu_link_page_id', 'menu_link_page', 'id');
          $this->createTable("page_translation", ['source_id' => $this->integer(), 'page_id' => $this->integer(), 'language' => $this->string(2)], $this->tableOptions);
         * 
         */
    }

    public function safeDown()
    {

        /*

          $this->dropTable("page_translation");
          $this->dropTable("menu_link_page");
          $this->dropTable("menu_link");
          $this->dropTable("menu");
         *  
         */
        $this->dropTable('article');
        $this->dropTable('page');
        return true;
    }

}
