<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('auction', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('Reg_No'); // Registration Number
            $table->string('Lot_num'); // Lot Number
            $table->string('Title'); // Auction Title
            $table->string('Mileage')->nullable(); // Mileage (nullable)
            $table->string('Featured_in')->nullable(); // Featured in (nullable)
            $table->string('Confirmed')->nullable(); // Confirmed status (nullable)
            $table->string('Date_venue'); // Date and venue of the auction (stored as string)
            $table->string('Auction_name'); // Auction name
            $table->string('Vehicle_Location'); // Vehicle location
            $table->string('lots')->nullable(); // Number of lots (nullable)
            $table->string('Images')->nullable(); // Images (nullable, can store URL or filename)
            $table->string('Vehicle_Type'); // Vehicle type
            $table->string('Colour'); // Vehicle colour
            $table->string('Fuel'); // Fuel type
            $table->string('Transmission'); // Transmission type
            $table->string('No_of_doors')->nullable(); // Number of doors
            $table->string('CO2_Emissions')->nullable(); // CO2 emissions
            $table->string('NOX_Emissions')->nullable(); // NOX emissions
            $table->string('No_of_keys')->nullable(); // Number of keys
            $table->string('Log_book')->nullable(); // Logbook status
            $table->string('No_of_owners')->nullable(); // Number of previous owners
            $table->string('Date_of_registration'); // Date of registration
            $table->string('VAT_Type')->nullable(); // VAT Type
            $table->string('Service_History')->nullable(); // Service history
            $table->string('Number_of_services')->nullable(); // Number of services
            $table->string('Last_Service')->nullable(); // Last service date
            $table->string('Last_service_mileage')->nullable(); // Last service mileage
            $table->string('DVSA_mileage')->nullable(); // DVSA mileage
            $table->string('Additional_service_notes')->nullable(); // Additional service notes
            $table->string('MOT_Expiry')->nullable(); // MOT expiry date
            $table->string('Declarations')->nullable(); // Declarations for auction items
            $table->string('Additional')->nullable(); // Additional information
            $table->string('Equipment')->nullable(); // Equipment details
            $table->string('Grade')->nullable(); // Auction grade
            $table->string('Condition_Report_text')->nullable(); // Condition report text
            $table->string('Condition_report')->nullable(); // Condition report
            $table->string('CAP_HPI')->nullable(); // CAP HPI value
            $table->string("Glass's")->nullable(); // Glass's pricing value
            $table->string('Pricing_text')->nullable(); // Pricing description
            $table->string('Other_rep_title')->nullable(); // Title for other reports
            $table->string('Other_rep_detail')->nullable(); // Details for other reports
            $table->string('Other_rep_link')->nullable(); // Link for other reports

            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auction');
    }
};
