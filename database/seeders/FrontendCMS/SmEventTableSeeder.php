<?php

namespace Database\Seeders\FrontendCMS;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SmEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sm_events')->insert([
            [
                'event_title' => 'Biggest Robotics Competition in Campus',
                'event_location' => 'Main Campus',
                
                'event_des' => "<div style='text-align: justify;'><b>Robotics Competition on Campus: Unleashing Innovation and Ingenuity</b></div><div style='text-align: justify;'>Prepare for an electrifying event as InfixEdu proudly announces its upcoming robotics competition set to ignite the campus with technological brilliance and inventive spirit.</div><div style='text-align: justify;'><br></div><div style='text-align: justify;'><b>Event Overview:</b></div><div style='text-align: justify;'>In the spirit of fostering creativity and technological prowess, our robotics competition provides a platform for students to showcase their engineering skills and problem-solving acumen. Participants will design and program robots to navigate challenges, promoting teamwork, critical thinking, and hands-on application of robotics concepts.</div><div style='text-align: justify;'><br></div><div style='text-align: justify;'><b>Competition Categories:</b></div><div style='text-align: justify;'>1. Autonomous Robot Challenge:</div><div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- Robots operate independently, completing predefined tasks using onboard sensors and programming.</div><div style='text-align: justify;'>2. Sumo Robot Showdown:</div><div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- Robots face off in a Sumo-style ring, aiming to push opponents out or disable them within the arena.</div><div style='text-align: justify;'>3. Innovation Showcase:</div><div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- Teams present innovative robotic projects, emphasizing real-world applications and creativity.</div><div style='text-align: justify;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</div><div style='text-align: justify;'><b>How to participate:</b></div><div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- Assemble a team of innovative minds (2-4 members).</div><div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- Register your team by the [Registration Deadline].</div><div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- Attend a pre-competition workshop for guidance on building and programming.</div><div style='text-align: justify;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</div><div style='text-align: justify;'><b>Prizes and recognition:</b></div><div style='text-align: justify;'>Outstanding teams will not only earn recognition for their skills but also compete for exciting prizes, fostering a competitive yet collaborative atmosphere.&nbsp; Instructors and mentors:</div><div style='text-align: justify;'>Expert mentors from our robotics faculty will be available to guide and support teams throughout the competition, ensuring a rich learning experience.</div><div style='text-align: justify;'>Join us for a day of innovation, competition, and celebration!</div><div style='text-align: justify;'>This robotics competition promises to be an exhilarating showcase of talent and technology. Don't miss the chance to be a part of this thrilling event, where creativity and robotics collide on our campus.</div><div style='text-align: justify;'>For inquiries and registration details, contact [Insert Contact Information]. Let the robotics revolution begin!</div>",
                
                'from_date' => '2024-10-12',
                'to_date' => '2024-10-16',
                'uplad_image_file' => 'public/uploads/events/event1.jpg',
            ],
            
            [
                'event_title' => 'Great Science Fair in Main Campus',
                'event_location' => 'Main Campus',
                
                'event_des' => "<div style='text-align: justify;'><b>Great Science Fair: Celebrating Discovery and Innovation</b></div>
                                <div style='text-align: justify;'>Join us for a fascinating journey into the world of science as InfixEdu presents its highly anticipated Science Fair! This event promises to ignite curiosity and inspire future scientists with hands-on exhibits, experiments, and displays.</div>
                                <div style='text-align: justify;'><br></div>
                                <div style='text-align: justify;'><b>Event Overview:</b></div>
                                <div style='text-align: justify;'>The Science Fair provides students with a unique platform to showcase their knowledge and creativity through interactive projects. Participants will delve into various fields of science, from biology and chemistry to physics and environmental studies, promoting critical thinking and scientific exploration.</div>
                                <div style='text-align: justify;'><br></div>
                                <div style='text-align: justify;'><b>Fair Categories:</b></div>
                                <div style='text-align: justify;'>1. Experimental Science:</div>
                                <div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- Students will present their scientific experiments, complete with hypotheses, research, and conclusions.</div>
                                <div style='text-align: justify;'>2. Engineering Innovations:</div>
                                <div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- Teams will showcase engineering solutions to real-world problems, combining design and functionality.</div>
                                <div style='text-align: justify;'>3. Environmental Science Exploration:</div>
                                <div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- Projects that highlight environmental challenges and propose innovative solutions.</div>
                                <div style='text-align: justify;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</div>
                                <div style='text-align: justify;'><b>How to participate:</b></div>
                                <div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- Form a team of 1-3 students and submit a project proposal by [Registration Deadline].</div>
                                <div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- Attend preparatory workshops to refine your projects and get expert guidance from our faculty.</div>
                                <div style='text-align: justify;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</div>
                                <div style='text-align: justify;'><b>Prizes and recognition:</b></div>
                                <div style='text-align: justify;'>Winners in each category will be awarded exciting prizes and certificates of achievement. Our expert panel of judges will evaluate projects based on originality, scientific accuracy, and creativity.</div>
                                <div style='text-align: justify;'>Don’t miss this opportunity to explore science in action and present your ideas to a captivated audience!</div>
                                <div style='text-align: justify;'>For more information and registration, please contact [Insert Contact Information].</div>
                            ",
                
                'from_date' => '2024-09-12',
                'to_date' => '2024-09-21',
                'uplad_image_file' => 'public/uploads/events/event2.jpg',
            ],
                  
            [
                'event_title' => 'Seminar on Internet of Thing in Campus',
                'event_location' => 'Main Campus',
                'event_des' => "<div style='text-align: justify;'><b>Seminar on Internet of Things (IoT): Shaping the Future of Connectivity</b></div>
                                    <div style='text-align: justify;'>InfixEdu proudly presents a seminar on the revolutionary concept of the Internet of Things (IoT). This event offers a deep dive into how IoT is transforming the way we interact with technology, from smart homes to industrial automation.</div>
                                    <div style='text-align: justify;'><br></div>
                                    <div style='text-align: justify;'><b>Event Overview:</b></div>
                                    <div style='text-align: justify;'>This seminar aims to provide attendees with insights into the emerging trends, applications, and challenges of IoT technology. Participants will gain a comprehensive understanding of how IoT integrates physical devices with the digital world, enabling communication, data exchange, and automation in real time.</div>
                                    <div style='text-align: justify;'><br></div>
                                    <div style='text-align: justify;'><b>Key Topics:</b></div>
                                    <div style='text-align: justify;'>1. IoT Fundamentals:</div>
                                    <div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- An introduction to the key concepts and architecture of the Internet of Things.</div>
                                    <div style='text-align: justify;'>2. Smart Devices and Sensors:</div>
                                    <div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- Explore how sensors and connected devices are used to collect and analyze data in various industries.</div>
                                    <div style='text-align: justify;'>3. Security Challenges in IoT:</div>
                                    <div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- Understanding the security concerns and solutions in IoT networks and systems.</div>
                                    <div style='text-align: justify;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</div>
                                    <div style='text-align: justify;'><b>How to participate:</b></div>
                                    <div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- The seminar is open to all students and faculty interested in exploring IoT technologies.</div>
                                    <div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- Register online by [Registration Deadline] to secure your spot.</div>
                                    <div style='text-align: justify;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</div>
                                    <div style='text-align: justify;'><b>Guest Speakers:</b></div>
                                    <div style='text-align: justify;'>Industry experts and IoT professionals will share their knowledge, providing valuable insights into current developments and future prospects in the IoT space.</div>
                                    <div style='text-align: justify;'>This seminar is an excellent opportunity to enhance your understanding of IoT, its applications, and its potential to revolutionize industries. Don’t miss out on this insightful and interactive event!</div>
                                    <div style='text-align: justify;'>For more details and registration information, contact [Insert Contact Information].</div>
                                ",
                'from_date' => '2024-06-12',
                'to_date' => '2024-06-18',
                'uplad_image_file' => 'public/uploads/events/event3.jpg',
            ],
            
            [
                'event_title' => 'Art Competition in Campus',
                'event_location' => 'Main Campus',
                
                'event_des' => "<div style='text-align: justify;'><b>Art Competition: Celebrating Creativity and Expression on Campus</b></div>
                                    <div style='text-align: justify;'>InfixEdu is excited to host an inspiring Art Competition, offering students a platform to showcase their creativity, passion, and artistic talent. This event invites participants from all artistic backgrounds to express their individuality through a variety of art forms.</div>
                                    <div style='text-align: justify;'><br></div>
                                    <div style='text-align: justify;'><b>Event Overview:</b></div>
                                    <div style='text-align: justify;'>The Art Competition is designed to celebrate diverse styles and mediums, from painting and drawing to sculpture and digital art. Students will have the opportunity to present their work to a panel of judges, with prizes awarded for the most innovative and captivating pieces.</div>
                                    <div style='text-align: justify;'><br></div>
                                    <div style='text-align: justify;'><b>Competition Categories:</b></div>
                                    <div style='text-align: justify;'>1. Painting and Drawing:</div>
                                    <div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- Showcase your skills in traditional or modern painting and drawing techniques.</div>
                                    <div style='text-align: justify;'>2. Sculpture and 3D Art:</div>
                                    <div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- Present your creativity in three-dimensional works that challenge form and space.</div>
                                    <div style='text-align: justify;'>3. Digital Art:</div>
                                    <div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- Explore the fusion of technology and art with digital creations.</div>
                                    <div style='text-align: justify;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</div>
                                    <div style='text-align: justify;'><b>How to participate:</b></div>
                                    <div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- Open to all students interested in art. You can register online by [Registration Deadline].</div>
                                    <div style='text-align: justify;'>&nbsp;&nbsp;&nbsp;&nbsp;- Submit your artwork in one of the specified categories before the competition date.</div>
                                    <div style='text-align: justify;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</div>
                                    <div style='text-align: justify;'><b>Judging and Prizes:</b></div>
                                    <div style='text-align: justify;'>Our panel of expert judges will evaluate the entries based on creativity, technique, and impact. The top artists will receive recognition and exciting prizes.</div>
                                    <div style='text-align: justify;'>Whether you're an aspiring artist or a seasoned creator, this competition is your chance to shine and share your vision with the campus community. Join us for a day of artistic inspiration and celebration!</div>
                                    <div style='text-align: justify;'>For more details and registration information, contact [Insert Contact Information].</div>
                                ",
                
                'from_date' => '2024-04-13',
                'to_date' => '2024-04-20',
                'uplad_image_file' => 'public/uploads/events/event4.jpg',
            ],
            
        ]);
    }
}
