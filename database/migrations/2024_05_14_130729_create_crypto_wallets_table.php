<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptoWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crypto_wallets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name', 191);
            $table->timestamps();
        });

        Schema::create('crypto_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('crypto_wallet_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('crypto_wallet_id')->references('id')->on('crypto_wallets')->onDelete('cascade');
            $table->decimal('btc_amount', 18, 8);
            $table->enum('type', ['buy', 'sell']);
            $table->decimal('amount', 18, 8);
            $table->decimal('price_per_unit', 18, 8);
            $table->timestamps();
        });

        Schema::create('crypto_portfolio_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('price_drop_alert', 18, 8)->nullable();
            $table->decimal('price_rise_alert', 18, 8)->nullable();
            $table->timestamps();
        });

        Schema::create('crypto_portfolio_snapshots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('total_value', 18, 8);
            $table->timestamps();
        });

        Schema::create('crypto_portfolio_snapshot_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portfolio_snapshot_id');
            $table->foreign('portfolio_snapshot_id', 'fk_snapshot_id')->references('id')->on('crypto_portfolio_snapshots')->onDelete('cascade');
            $table->unsignedBigInteger('crypto_wallet_id');
            $table->foreign('crypto_wallet_id')->references('id')->on('crypto_wallets')->onDelete('cascade');
            $table->decimal('value', 18, 8);
            $table->timestamps();
        });

        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('tokenable_type', 191);
            $table->unsignedBigInteger('tokenable_id');
            $table->index(['tokenable_type', 'tokenable_id']);
            $table->string('name', 191);
            $table->string('token', 191)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
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
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('crypto_portfolio_snapshot_details');
        Schema::dropIfExists('crypto_portfolio_snapshots');
        Schema::dropIfExists('crypto_portfolio_settings');
        Schema::dropIfExists('crypto_transactions');
        Schema::dropIfExists('crypto_wallets');
    }
}




