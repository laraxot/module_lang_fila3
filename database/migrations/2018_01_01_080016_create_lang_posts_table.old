<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// --- models --
use Modules\Lang\Models\Post;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/*
 * Class CreateLangPostsTable.
 */
return new class extends XotBaseMigration {
    protected ?string $model_class = Post::class;

    /**
     * db up.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $blueprint): void {
                $blueprint->increments('id');
                $blueprint->nullableMorphs('post');
                $blueprint->string('lang', 2)->nullable();
                $blueprint->string('title')->nullable()->index();
                $blueprint->string('subtitle')->nullable();
                $blueprint->string('guid')->index()->nullable();
                $blueprint->text('txt')->nullable();
                $blueprint->string('image_src')->nullable();
                $blueprint->string('image_alt')->nullable();
                $blueprint->string('image_title')->nullable();
                $blueprint->text('meta_description')->nullable();
                $blueprint->text('meta_keywords')->nullable();
                $blueprint->integer('author_id')->nullable();
                $blueprint->timestamps();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $blueprint): void {
                // if (!$this->hasColumn( 'post_type')) {
                //     $table->string('post_type', 40)->after('type')->index()->nullable();
                // }
                // Class 'Doctrine\DBAL\Driver\PDOMySql\Driver' not found
                /*
                $schema_builder = Schema::getConnection()
                    ->getDoctrineSchemaManager()
                    ->listTableDetails($table->getTable());

                if (! $schema_builder->hasIndex($this->getTable().'_'.'guid'.'_index')) {
                    $table->string('guid', 100)->index()->change();
                }
                */
                if (! $this->hasColumn('guid')) {
                    $blueprint->string('guid')->nullable();
                }
                if (! $this->hasColumn('category_id')) {
                    $blueprint->integer('category_id')->nullable();
                }
                if (! $this->hasColumn('author_id')) {
                    $blueprint->integer('author_id')->nullable();
                }
                if (! $this->hasColumn('subtitle')) {
                    $blueprint->string('subtitle')->nullable();
                }
                if (! $this->hasColumn('image')) {
                    $blueprint->string('image')->nullable();
                }
                if (! $this->hasColumn('image_alt')) {
                    $blueprint->string('image_alt')->nullable();
                }
                if (! $this->hasColumn('image_title')) {
                    $blueprint->string('image_title')->nullable();
                }
                if (! $this->hasColumn('meta_description')) {
                    $blueprint->text('meta_description')->nullable();
                }
                if (! $this->hasColumn('meta_keywords')) {
                    $blueprint->text('meta_keywords')->nullable();
                }
                if (! $this->hasColumn('content')) {
                    $blueprint->text('content')->nullable();
                }
                if (! $this->hasColumn('published')) {
                    $blueprint->boolean('published')->nullable();
                }
                if (! $this->hasColumn('created_by')) {
                    $blueprint->string('created_by')->nullable();
                }
                if (! $this->hasColumn('updated_by')) {
                    $blueprint->string('updated_by')->nullable();
                }

                if (! $this->hasColumn('url')) {
                    $blueprint->string('url')->nullable();
                }
                if (! $this->hasColumn('url_lang')) {
                    $blueprint->text('url_lang')->nullable();
                }
                if (! $this->hasColumn('image_resize_src')) {
                    $blueprint->text('image_resize_src')->nullable();
                }
                if (! $this->hasColumn('linked_count')) {
                    $blueprint->text('linked_count')->nullable();
                }
                if (! $this->hasColumn('related_count')) {
                    $blueprint->text('related_count')->nullable();
                }
                if (! $this->hasColumn('relatedrev_count')) {
                    $blueprint->text('relatedrev_count')->nullable();
                }
                if (! $this->hasColumn('linkable_type')) {
                    $blueprint->string('linkable_type', 20)->index()->nullable();
                }
                if (! $this->hasColumn('post_type')) {
                    $blueprint->string('post_type', 40)->index()->nullable();
                }

                if (! $this->hasColumn('views_count')) {
                    $blueprint->integer('views_count')->nullable(); // contatore di visualizzazioni
                }

                if (! $this->hasColumn('user_id')) {
                    $blueprint->integer('user_id')->nullable()->after('id');
                }

                // ------- CHANGE INDEX-------

                // Doctrine\DBAL\Driver\PDOMySql\Driver
                /*
                $schema_builder = Schema::getConnection()
                    ->getDoctrineSchemaManager()
                    ->listTableDetails($table->getTable());

                if (! $schema_builder->hasIndex($this->getTable().'_'.'post_id'.'_index')) {
                    $table->integer('post_id')->nullable()->index()->change();
                }
                // if (!$schema_builder->hasIndex($this->getTable().'_'.'type'.'_index')) {
                //     $table->string('type', 30)->nullable()->index()->change();
                // }
                if (! $schema_builder->hasIndex($this->getTable().'_'.'lang'.'_index')) {
                    $table->string('lang', 3)->nullable()->index()->change();
                }
                */
                // -------- CHANGE FIELD -------------
                $blueprint->text('subtitle')->nullable()->change();
            }
        );
    }

    // end up
}; // end class
