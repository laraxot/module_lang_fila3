<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// --- models --
use Modules\Lang\Models\Post;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/*
 * Class CreateTranslationsTable.
 */
return new class extends XotBaseMigration {
    // protected ?string $model_class = Post::class;
    /**
     * db up.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $blueprint): void {
                $blueprint->collation = 'utf8mb4_bin';
                $blueprint->increments('id');
                // $table->integer('status')->default(0);
                $blueprint->string('lang');
                $blueprint->string('namespace');
                $blueprint->string('group');
                $blueprint->string('item')->nullable();
                $blueprint->text('value')->nullable();

                $blueprint->timestamps();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $blueprint): void {
                if (! $this->hasColumn('namespace')) {
                    $blueprint->string('namespace');
                }
                if (! $this->hasColumn('group')) {
                    $blueprint->string('group');
                }
                if (! $this->hasColumn('item')) {
                    $blueprint->string('item')->nullable();
                }
                if (! $this->hasColumn('value')) {
                    $blueprint->text('value')->nullable();
                }

                if (! $this->hasColumn('created_by')) {
                    $this->updateTimestamps($blueprint);
                }
            }
        );
    }

    // end up
}; // end class
