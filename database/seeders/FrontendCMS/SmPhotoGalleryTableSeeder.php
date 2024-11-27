<?php

namespace Database\Seeders\FrontendCMS;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SmPhotoGalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sm_photo_galleries')->insert([
            [
                'parent_id' => null,
                'name' => 'Explore Your Academic Horizons: A Learning Fiesta for Everyone!',
            
                'description' => "
                    <div><font color='#9c9c9c'>Dive into a world of knowledge and discovery at our Academic Expo tailored for individuals of all roles in education. Whether you're a teacher, student, administrator, or industry enthusiast, this expo promises to be an exciting platform for learning, connecting, and advancing.</font></div>
                    <div><font color='#9c9c9c'><br></font><b>What's In Store:</b>&nbsp; &nbsp;</div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<font color='#9c9c9c'>1. Empowering Educators:</font></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='#9c9c9c'>- Immerse yourself in innovative teaching techniques and tech advancements.</font></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='#9c9c9c'>- Attend workshops led by renowned education experts.</font></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='#9c9c9c'>- Discover resources to spice up your classrooms and engage students.</font></div>
                    <div><font color='#9c9c9c'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</font></div>
                    <div><b>&nbsp;&nbsp;&nbsp;&nbsp;<font color='#9c9c9c'>2. Student Zone Extravaganza:</font></b></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='#9c9c9c'>- Get career guidance and insights in student-centric sessions.</font></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='#9c9c9c'>- Explore academic programs and cool extracurricular opportunities.</font></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='#9c9c9c'>- Engage in interactive exhibits igniting a passion for learning.</font></div>
                    <div><font color='#9c9c9c'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</font></div>
                    <div><b>&nbsp;&nbsp;&nbsp;&nbsp;<font color='#9c9c9c'>3. Admin Brilliance Unleashed:</font></b></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='#9c9c9c'>- Check out the latest and greatest in school management systems.</font></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='#9c9c9c'>- Mix and mingle with fellow administrators.</font></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='#9c9c9c'>- Grab strategies to streamline administrative tasks and boost efficiency.</font></div>
                    <div><font color='#9c9c9c'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</font></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<font color='#9c9c9c'><b>4. Industry Vibes:</b></font></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='#9c9c9c'>- Connect with pros to bridge the gap between school and real-world scenarios.</font></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='#9c9c9c'>- Chat about aligning academics with industry needs.</font></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='#9c9c9c'>- See successful collaborations between the academic and business worlds.</font>&nbsp;</div>
                    <div><br></div>
                    <div><font color='#9c9c9c'><b>Why Be There?</b></font></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;- Network Power: Build connections with educators, students, administrators, and industry buffs.<br></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;- Innovation Parade: Spot the newest trends shaping the future of education.<br></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;- Skill Boost: Pick up fresh skills and knowledge to rock your role in the education community.<br></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;- Team Up for Learning: Swap ideas, success tales, and best practices with peers from various educational realms.<br></div>
                    <div><font color='#9c9c9c'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</font></div>
                    <div><b>Event Dates:</b></div>
                    <div><font color='#9c9c9c'>🗓️ Date: [Insert Date]</font></div>
                    <div><font color='#9c9c9c'>🕒 Time: [Insert Time]</font></div>
                    <div><font color='#9c9c9c'>📍 Where: [Insert Venue]</font></div>
                    <div><font color='#9c9c9c'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</font></div>
                    <div><font color='#9c9c9c'><b>Claim Your Spot - RSVP Now!</b></font></div>
                    <div><font color='#9c9c9c'>Join us at the Academic Fiesta for Everyone and become part of an exhilarating and collaborative learning experience. Reserve your spot now to unlock new possibilities in the world of education. Let's shape the future of academia together!</font></div>
                ",
                'feature_image' => "public/uploads/theme/edulia/photo_gallery/gallery-1.jpg",
                'gallery_image' => null,
                'position' => 1,
            ],

            [
                'parent_id' => Null,
                'name' => 'Explore Your Academic Horizons: A Learning Fiesta for Everyone!',
            
                'description' => "
                    <div><span style='color:#9c9c9c'>Dive into a world of knowledge and discovery at our Academic Expo tailored for individuals of all roles in education. Whether you're a teacher, student, administrator, or industry enthusiast, this expo promises an exciting platform for learning, connecting, and advancing.</span></div>
            
                    <div><br><strong>What's In Store:</strong></div>
                    
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>1. Empowering Educators:</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Immerse yourself in innovative teaching techniques and tech advancements.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Attend workshops led by renowned education experts.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Discover resources to spice up your classrooms and engage students.</span></div>
            
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'><strong>2. Student Zone Extravaganza:</strong></span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Get career guidance and insights in student-centric sessions.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Explore academic programs and extracurricular opportunities.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Engage in interactive exhibits igniting a passion for learning.</span></div>
            
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'><strong>3. Admin Brilliance Unleashed:</strong></span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Check out the latest in school management systems.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Mix and mingle with fellow administrators.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Grab strategies to streamline tasks and boost efficiency.</span></div>
            
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'><strong>4. Industry Vibes:</strong></span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Connect with pros bridging education and industry.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Chat about aligning academics with industry needs.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Discover collaborations between academic and business worlds.</span></div>
            
                    <div><br><strong>Why Be There?</strong></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Network Power: Build connections with educators, students, administrators, and industry enthusiasts.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Innovation Parade: Spot the newest trends shaping the future of education.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Skill Boost: Pick up fresh skills to excel in the education community.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Team Up for Learning: Exchange ideas, stories, and practices with peers across education.</span></div>
            
                    <div><br><strong>Event Details:</strong></div>
                    <div><span style='color:#9c9c9c'>🗓️ Date: [Insert Date]</span></div>
                    <div><span style='color:#9c9c9c'>🕒 Time: [Insert Time]</span></div>
                    <div><span style='color:#9c9c9c'>📍 Where: [Insert Venue]</span></div>
            
                    <div><br><strong>Claim Your Spot - RSVP Now!</strong></div>
                    <div><span style='color:#9c9c9c'>Join us at the Academic Fiesta for Everyone and become part of an exhilarating learning experience. Reserve your spot now and unlock new educational opportunities. Let's shape the future of academia together!</span></div>
                ",
            
                'feature_image' => "public/uploads/theme/edulia/photo_gallery/gallery-1.jpg",
                'gallery_image' => Null,
                'position' => 1,
            ],
            

            [
                'parent_id' => Null,
                'name' => 'Dive into the World of Words: Language and Literature Fiesta!',
            
                'description' => "
                    <div><span style='color:#9c9c9c'>Embark on a literary journey like never before at our Language and Literature Fiesta, a celebration of the profound beauty and power of language. This event is tailored for all the bookworms, wordsmiths, and language enthusiasts who appreciate the magic woven through words.</span></div>
            
                    <div><br><strong>Event Highlights:</strong></div>
            
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>1. Author Spotlight:</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Engage with acclaimed authors as they share insights into their literary works.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Participate in intimate Q&A sessions to delve deeper into the creative process.</span></div>
            
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'><strong>2. Book Bazaar:</strong></span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Explore a diverse collection of literary gems at our book bazaar.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Discover hidden treasures and add new favorites to your personal library.</span></div>
            
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'><strong>3. Poetry Corner:</strong></span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Immerse yourself in the lyrical world of poetry with live recitations and open mic sessions.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Join interactive poetry workshops to hone your poetic skills.</span></div>
            
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'><strong>4. Literary Debates and Discussions:</strong></span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Engage in lively debates on contemporary literary topics.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Participate in book club discussions to share thoughts on recent literary releases.</span></div>
            
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'><strong>5. Multilingual Extravaganza:</strong></span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Celebrate the richness of language diversity with readings and performances in various languages.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Language exchange booths for attendees to share their linguistic expertise.</span></div>
            
                    <div><br><strong>Why Attend?</strong></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Literary Exploration: Discover new authors, genres, and literary movements.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Interactive Workshops: Hone your writing skills through engaging workshops.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Community Connection: Connect with fellow literature enthusiasts and form lasting literary bonds.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Cultural Appreciation: Immerse yourself in the beauty of diverse languages and cultures.</span></div>
            
                    <div><br><strong>Event Details:</strong></div>
                    <div><span style='color:#9c9c9c'>🗓️ Date: [Insert Date]</span></div>
                    <div><span style='color:#9c9c9c'>🕒 Time: [Insert Time]</span></div>
                    <div><span style='color:#9c9c9c'>📍 Where: [Insert Venue]</span></div>
            
                    <div><br><strong>Unlock the World of Words - RSVP Now!</strong></div>
                    <div><span style='color:#9c9c9c'>Join us at the Language and Literature Fiesta for a day filled with the magic of language, literature, and cultural appreciation. Reserve your spot now to be part of an event that celebrates the beauty of words and the stories they tell!</span></div>
                ",
            
                'feature_image' => "public/uploads/theme/edulia/photo_gallery/gallery-3.jpg",
                'gallery_image' => Null,
                'position' => 3,
            ],            

            [
                'parent_id' => Null,
                'name' => 'Embrace Change: Environmental Awareness Day!',
                
                'description' => "
                    <div><span style='color:#9c9c9c'>Gear up for a day devoted to raising awareness, inspiring action, and celebrating our shared commitment to the environment – it's Environmental Awareness Day! This event unites communities, individuals, and organizations in a collective effort to promote sustainable practices and safeguard our planet for future generations.</span></div>
            
                    <div><br><strong>Event Highlights:</strong></div>
                    
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>1. Informative Sessions:</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Engage in enlightening sessions on sustainable living, conservation, and the significance of eco-friendly choices.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Discover how small, everyday actions can collectively contribute to a healthier environment.</span></div>
                    
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>2. Eco-Friendly Showcase:</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Explore exhibits featuring green products, sustainable technologies, and local eco-friendly initiatives.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Connect with environmental organizations to learn about ongoing projects and ways to participate.</span></div>
                    
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>3. Nature Appreciation Activities:</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Immerse yourself in the beauty of nature through guided nature walks that highlight local ecosystems.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Participate in community clean-up drives, contributing directly to the preservation of our natural surroundings.</span></div>
                    
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>4. Expert Talks:</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Listen to influential environmentalists and experts sharing insights on global environmental challenges and solutions.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Gain a deeper understanding of the importance of environmental conservation.</span></div>
                    
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>5. Art for Change:</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Experience visually compelling art installations conveying powerful messages about environmental issues.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Join interactive art projects symbolizing our collective responsibility to nurture and protect our planet.</span></div>
            
                    <div><br><strong>Why Participate?</strong></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Learn and Act: Gain practical knowledge and insights to incorporate eco-friendly practices into your daily life.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Community Connection: Connect with like-minded individuals and organizations committed to environmental stewardship.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Hands-On Impact: Contribute directly to positive environmental change through participation in clean-up initiatives.</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9c9c9c'>- Inspiration to Adopt Change: Be inspired by experts and fellow participants to make sustainable choices for a greener future.</span></div>
            
                    <div><br><strong>Event Details:</strong></div>
                    <div><span style='color:#9c9c9c'>🗓️ Date: [Insert Date]</span></div>
                    <div><span style='color:#9c9c9c'>🕒 Time: [Insert Time]</span></div>
                    <div><span style='color:#9c9c9c'>📍 Location: [Insert Venue]</span></div>
            
                    <div><br><strong>Become the Catalyst for Change - RSVP Now!</strong></div>
                    <div><span style='color:#9c9c9c'>Join us at Environmental Awareness Day and play a role in promoting a sustainable and eco-conscious future. Reserve your spot now to be part of this impactful initiative!</span></div>
                ",
                
                'feature_image' => "public/uploads/theme/edulia/photo_gallery/gallery-4.jpg",
                'gallery_image' => Null,
                'position' => 4,
            ],
            
        ]);
    }
}
