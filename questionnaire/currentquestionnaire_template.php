<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Heritage Questionnaire</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/hhelmet2.png" alt="Viking Helmet Icon" class="icon">
            <h1>Family Heritage Questionnaire</h1>
        </div>
        <nav>
            <a href="../landing_page.php" class="landing-link">Return to Landing Page</a>
            <ul>
                <li><a href="#personal-information">Personal Information</a></li>
                <li><a href="#family-and-heritage">Family and Heritage</a></li>
                <li><a href="#early-years">Early Years</a></li>
                <li><a href="#adolescence">Adolescence</a></li>
                <li><a href="#young-adulthood">Young Adulthood</a></li>
                <li><a href="#marriage-and-family">Marriage and Family</a></li>
                <li><a href="#career-and-achievements">Career and Achievements</a></li>
                <li><a href="#later-years">Later Years</a></li>
                <li><a href="#hobbies-and-events">Hobbies and Events</a></li>
                <li><a href="#health-and-wellness">Health and Wellness</a></li>
                <li><a href="#technology-and-beliefs">Technology and Beliefs</a></li>
                <li><a href="#additional-notes">Additional Notes</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form id="questionnaireForm">
            <!-- Personal Information Section -->
            <section id="personal-information">
                <h2>Personal Information</h2>
                <div class="question">
                    <label for="fullName">Full Name:</label>
                    <input type="text" id="fullName" placeholder="Enter your full name">
                </div>
                <div class="question">
                    <label for="preferredName">Preferred Name:</label>
                    <input type="text" id="preferredName" placeholder="Name you like to be called">
                </div>
                <div class="question">
                    <label for="birthOrder">Birth Order:</label>
                    <input type="text" id="birthOrder" placeholder="e.g., First child, Second child">
                </div>
                <div class="question">
                    <label for="birthDate">Date of Birth:</label>
                    <input type="date" id="birthDate">
                </div>
                <div class="question">
                    <label for="birthTime">Time of Birth (optional):</label>
                    <input type="time" id="birthTime" placeholder="HH:MM">
                </div>
                <div class="question">
                    <label for="birthPlace">Place of Birth:</label>
                    <input type="text" id="birthPlace" placeholder="City, State/Province, Country">
                </div>
            </section>

            <!-- Family and Heritage Section -->
            <section id="family-and-heritage">
                <h2>Family and Heritage</h2>
                <div class="question">
                    <label for="parents">Parents:</label>
                    <textarea id="parents" placeholder="Full names, birth dates, places, occupations, notable life events"></textarea>
                </div>
                <div class="question">
                    <label for="grandparents">Grandparents:</label>
                    <textarea id="grandparents" placeholder="Names, ancestry, cultural background, memorable stories"></textarea>
                </div>
                <div class="question">
                    <label for="siblings">Siblings:</label>
                    <textarea id="siblings" placeholder="Names, birth order, unique characteristics, shared experiences"></textarea>
                </div>
                <div class="question">
                    <label for="familyTraditions">Family Traditions:</label>
                    <textarea id="familyTraditions" placeholder="Special traditions during holidays, birthdays, or other occasions"></textarea>
                </div>
            </section>

            <!-- Early Years Section -->
            <section id="early-years">
                <h2>Early Years</h2>
                <div class="question">
                    <label for="firstMemory">First Memory:</label>
                    <textarea id="firstMemory" placeholder="Describe your first memory"></textarea>
                </div>
                <div class="question">
                    <label for="favoriteToy">Favorite Toy or Game:</label>
                    <textarea id="favoriteToy" placeholder="Describe your favorite toy or game"></textarea>
                </div>
                <div class="question">
                    <label for="significantEvent">Most Significant Event:</label>
                    <textarea id="significantEvent" placeholder="Describe a significant event during your early years"></textarea>
                </div>
            </section>

            <!-- Adolescence Section -->
            <section id="adolescence">
                <h2>Adolescence</h2>
                <div class="question">
                    <label for="schooling">Schooling:</label>
                    <textarea id="schooling" placeholder="Schools attended, favorite subjects, achievements"></textarea>
                </div>
                <div class="question">
                    <label for="friendships">Friendships:</label>
                    <textarea id="friendships" placeholder="Names, characteristics, memorable experiences"></textarea>
                </div>
                <div class="question">
                    <label for="extracurricular">Extracurricular Activities:</label>
                    <textarea id="extracurricular" placeholder="Clubs, sports, or hobbies pursued during school years"></textarea>
                </div>
                <div class="question">
                    <label for="partTimeJobs">Part-Time Jobs:</label>
                    <textarea id="partTimeJobs" placeholder="First job, memorable work experiences as a teenager"></textarea>
                </div>
            </section>

            <!-- Young Adulthood Section -->
            <section id="young-adulthood">
                <h2>Young Adulthood</h2>
                <div class="question">
                    <label for="higherEducation">Higher Education:</label>
                    <textarea id="higherEducation" placeholder="Colleges or universities attended, degrees earned"></textarea>
                </div>
                <div class="question">
                    <label for="militaryService">Military Service (if applicable):</label>
                    <textarea id="militaryService" placeholder="Branch of service, roles, locations"></textarea>
                </div>
                <div class="question">
                    <label for="earlyCareer">Early Career:</label>
                    <textarea id="earlyCareer" placeholder="First significant job, challenges faced, lessons learned"></textarea>
                </div>
            </section>

           <!-- Marriage and Family -->
<section class="questionnaire-section" id="marriage-and-family">
    <h2>Marriage and Family</h2>
    <div class="question">
        <label for="proposalStory">Proposal Story:</label>
        <textarea id="proposalStory" placeholder="How did you propose (or get proposed to)?"></textarea>
    </div>
    <div class="question">
        <label for="weddingDetails">Wedding Details:</label>
        <textarea id="weddingDetails" placeholder="Date, venue, and memorable moments"></textarea>
    </div>
    <div class="question">
        <label for="children">Children:</label>
        <textarea id="children" placeholder="Names, birth dates, and unique characteristics"></textarea>
    </div>
    <div class="question">
        <label for="familyLife">Family Life:</label>
        <textarea id="familyLife" placeholder="Typical day in your family life, lessons taught"></textarea>
    </div>
</section>

<!-- Career and Achievements -->
<section class="questionnaire-section" id="career-and-achievements">
    <h2>Career and Achievements</h2>
    <div class="question">
        <label for="careerProgression">Career Progression:</label>
        <textarea id="careerProgression" placeholder="Significant roles, promotions, and achievements"></textarea>
    </div>
    <div class="question">
        <label for="communityInvolvement">Community Involvement:</label>
        <textarea id="communityInvolvement" placeholder="Volunteer work or community service"></textarea>
    </div>
    <div class="question">
        <label for="mentorship">Mentorship:</label>
        <textarea id="mentorship" placeholder="Mentors who influenced you, people you mentored"></textarea>
    </div>
</section>

<!-- Later Years -->
<section class="questionnaire-section" id="later-years">
    <h2>Later Years</h2>
    <div class="question">
        <label for="retirement">Retirement:</label>
        <textarea id="retirement" placeholder="Activities pursued after retirement, changes in routine"></textarea>
    </div>
    <div class="question">
        <label for="lifeLessons">Life Lessons:</label>
        <textarea id="lifeLessons" placeholder="Most valuable lessons learned"></textarea>
    </div>
    <div class="question">
        <label for="adviceForFuture">Advice for Future Generations:</label>
        <textarea id="adviceForFuture" placeholder="Wisdom or guidance you would like to share"></textarea>
    </div>
</section>

<!-- Hobbies and Events -->
<section class="questionnaire-section" id="hobbies-and-events">
    <h2>Hobbies and Events</h2>
    <div class="question">
        <label for="hobbies">Hobbies:</label>
        <textarea id="hobbies" placeholder="Hobbies developed over the years"></textarea>
    </div>
    <div class="question">
        <label for="worldEvents">World Events:</label>
        <textarea id="worldEvents" placeholder="Major global events that impacted your life"></textarea>
    </div>
    <div class="question">
        <label for="personalChallenges">Personal Challenges:</label>
        <textarea id="personalChallenges" placeholder="Difficult times and how you overcame them"></textarea>
    </div>
    <div class="question">
        <label for="travel">Travel:</label>
        <textarea id="travel" placeholder="Favorite trips and destinations"></textarea>
    </div>
</section>

<!-- Health and Wellness -->
<section class="questionnaire-section" id="health-and-wellness">
    <h2>Health and Wellness</h2>
    <div class="question">
        <label for="healthMilestones">Health Milestones:</label>
        <textarea id="healthMilestones" placeholder="Major health milestones or challenges"></textarea>
    </div>
    <div class="question">
        <label for="lifestyleChanges">Lifestyle Changes:</label>
        <textarea id="lifestyleChanges" placeholder="Changes that improved your health"></textarea>
    </div>
    <div class="question">
        <label for="wellnessTips">Wellness Tips:</label>
        <textarea id="wellnessTips" placeholder="Tips for maintaining physical and mental well-being"></textarea>
    </div>
</section>

<!-- Technology and Beliefs -->
<section class="questionnaire-section" id="technology-and-beliefs">
    <h2>Technology and Beliefs</h2>
    <div class="question">
        <label for="firstTechExperience">First Technology Experience:</label>
        <textarea id="firstTechExperience" placeholder="First experiences with new technologies"></textarea>
    </div>
    <div class="question">
        <label for="favoriteGadgets">Favorite Gadgets:</label>
        <textarea id="favoriteGadgets" placeholder="Your favorite tech gadgets or tools"></textarea>
    </div>
    <div class="question">
        <label for="astrologicalSign">Astrological Sign:</label>
        <textarea id="astrologicalSign" placeholder="Your astrological sign and if it reflects your personality"></textarea>
    </div>
    <div class="question">
        <label for="culturalPractices">Cultural Practices:</label>
        <textarea id="culturalPractices" placeholder="Cultural or religious practices observed"></textarea>
    </div>
</section>

<!-- Additional Notes -->
<section class="questionnaire-section" id="additional-notes">
    <h2>Additional Notes</h2>
    <div class="question">
        <label for="unfinishedDreams">Unfinished Dreams:</label>
        <textarea id="unfinishedDreams" placeholder="Unfinished dreams or goals"></textarea>
    </div>
    <div class="question">
        <label for="messagesForFuture">Messages for Future Generations:</label>
        <textarea id="messagesForFuture" placeholder="Anything you'd like to share for future generations"></textarea>
    </div>
</section>

 <!-- Repeat similar patterns for remaining sections -->

            <button type="submit" class="btn">Submit</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 Family Heritage Questionnaire | All rights reserved</p>
    </footer>

    <script src="scripts/questionnaireTemplate.js"></script>
</body>
</html>
