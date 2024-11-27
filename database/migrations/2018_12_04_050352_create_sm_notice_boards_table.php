<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmNoticeBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sm_notice_boards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('notice_title', 200)->nullable();
            $table->text('notice_message')->nullable();
            $table->date('notice_date')->nullable();
            $table->date('publish_on')->nullable();
            $table->string('inform_to', 200)->nullable()->comment('Notice message sent to these roles');
            $table->tinyInteger('active_status')->default(1);
            $table->integer('is_published')->nullable()->default(0);
            $table->timestamps();


            $table->integer('created_by')->nullable()->default(1)->unsigned();

            $table->integer('updated_by')->nullable()->default(1)->unsigned();

            $table->integer('school_id')->nullable()->default(1)->unsigned();
            $table->foreign('school_id')->references('id')->on('sm_schools')->onDelete('cascade');
            
            $table->integer('academic_id')->nullable()->default(1)->unsigned();
            $table->foreign('academic_id')->references('id')->on('sm_academic_years')->onDelete('cascade');
        });

        DB::table('sm_notice_boards')->insert([
            [
                'notice_title'      => 'Parent-Teacher Meeting (PTM)',
                'notice_message'    => "We are delighted to invite you to our upcoming Parent-Teacher Meeting scheduled for 12-12-2024 from 09:00 AM to 11:59AM. This is an excellent opportunity for you to discuss your child's progress, address any concerns, and collaborate with our dedicated teachers to ensure a successful academic journey.",
                'notice_date'       => date("Y-m-d"),
                'publish_on'        => date("Y-m-d"),
                'inform_to'         => "[1]",
                'is_published'      => 1,
            ],
            [
                'notice_title'      => 'Upcoming Events',
                'notice_message'    => "Stay tuned for exciting upcoming events at InfixEdu School, including Book Fair, Sports, and Debate competition. We encourage all students and parents to actively participate and make these events memorable experiences for the entire school community.",
                'notice_date'       => date("Y-m-d"),
                'publish_on'        => date("Y-m-d"),
                'inform_to'         => "[1]",
                'is_published'      => 1,
            ],
            [
                'notice_title'      => 'School Timings',
                'notice_message'    => "Please note that the school timings remain unchanged. Kindly ensure that your child arrives at school on time, ready to engage in a day of learning and growth.",
                'notice_date'       => date("Y-m-d"),
                'publish_on'        => date("Y-m-d"),
                'inform_to'         => "[1]",
                'is_published'      => 1,
            ],
            [
                'notice_title'      => 'Uniform and Dress Code',
                'notice_message'    => "We appreciate your cooperation in ensuring that students adhere to the prescribed uniform and dress code. This contributes to a positive and disciplined learning environment.",
                'notice_date'       => date("Y-m-d"),
                'publish_on'        => date("Y-m-d"),
                'inform_to'         => "[1]",
                'is_published'      => 1,
            ],
            [
                'notice_title'      => 'Safety and Security',
                'notice_message'    => "The safety and security of our students are of utmost importance. We request parents to follow the designated drop-off and pick-up points, and kindly inform the school in advance of any changes in transportation arrangements.",
                'notice_date'       => date("Y-m-d"),
                'publish_on'        => date("Y-m-d"),
                'inform_to'         => "[1]",
                'is_published'      => 1,
            ],
            [
                'notice_title'      => 'Winter Break',
                'notice_message'    => "InfixEdu School will be closed for the winter break from 15/12/2024 to 31/12/2024. We wish all our students and their families a joyful and restful holiday season.",
                'notice_date'       => date("Y-m-d"),
                'publish_on'        => date("Y-m-d"),
                'inform_to'         => "[1]",
                'is_published'      => 1,
            ],
            [
                'notice_title'      => 'Feedback and Suggestions',
                'notice_message'    => "We value your feedback and suggestions. If you have any ideas or concerns you would like to share, please feel free to reach out to the school administration.",
                'notice_date'       => date("Y-m-d"),
                'publish_on'        => date("Y-m-d"),
                'inform_to'         => "[1]",
                'is_published'      => 1,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sm_notice_boards');
    }
}
