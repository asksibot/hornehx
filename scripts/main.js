// Log a message to confirm the script is linked
console.log("Family Heritage Site is up and running!");

/**
 * Smooth Scrolling for Navigation
 * Allows smooth scrolling to sections when navigation links are clicked.
 */
document.querySelectorAll('nav ul li a').forEach(link => {
    link.addEventListener('click', function (e) {
        // Check if the link is an anchor link
        if (this.getAttribute('href').startsWith('#')) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                window.scrollTo({
                    top: targetSection.offsetTop - 50, // Offset for fixed header
                    behavior: 'smooth'
                });
                console.log(`Smooth scrolled to section: ${targetId}`);
            } else {
                console.warn(`Target section with ID "${targetId}" not found.`);
            }
        }
    });
});

/**
 * Toggle Mobile Navigation
 * Handles the opening and closing of the mobile navigation menu.
 */
const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('nav ul');

if (hamburger && navLinks) {
    hamburger.addEventListener('click', () => {
        navLinks.classList.toggle('open');
        console.log("Mobile navigation toggled.");
    });
} else {
    console.warn("Hamburger menu or navigation links not found.");
}

/**
 * Dynamic Timeline Placeholder
 * Placeholder for future implementation of an interactive timeline.
 */
const timelineSection = document.querySelector('#timeline');
if (timelineSection) {
    // Placeholder for future interactive timeline implementation
    console.log("Timeline section found. Placeholder ready.");
} else {
    console.warn("Timeline section not found.");
}

/**
 * Dynamic Photo Gallery Loading
 * Dynamically loads and displays photos in the photo gallery section.
 */
const gallery = document.querySelector('.gallery');
if (gallery) {
    const photos = [
        'images/sample-photo.jpg', // Replace with real paths to images
        'images/family-photo1.jpg',
        'images/family-photo2.jpg'
    ];

    photos.forEach(photo => {
        const img = document.createElement('img');
        img.src = photo;
        img.alt = "Family Photo";
        img.classList.add('gallery-image');
        gallery.appendChild(img);
        console.log(`Photo added to gallery: ${photo}`);
    });
} else {
    console.warn("Gallery container not found.");
}

/**
 * Handle Story Form Submission
 * Manages the submission of the family stories form.
 */
const storyForm = document.getElementById('story-form');
if (storyForm) {
    storyForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const title = document.getElementById('story-title').value.trim();
        const author = document.getElementById('story-author').value.trim();
        const content = document.getElementById('story-content').value.trim();

        if (title && author && content) {
            alert(`Thank you, ${author}! Your story "${title}" has been submitted.`);
            console.log(`Story submitted by ${author}: "${title}"`);
            this.reset(); // Reset the form fields
        } else {
            alert("Please fill in all fields before submitting.");
            console.warn("Story form submission attempted with incomplete fields.");
        }
    });
} else {
    console.warn("Story form not found.");
}

/**
 * Handle Contact Form Submission
 * Manages the submission of the contact form.
 */
const contactForm = document.getElementById('contact-form');
if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const name = document.getElementById('contact-name').value.trim();
        const email = document.getElementById('contact-email').value.trim();
        const message = document.getElementById('contact-message').value.trim();

        if (name && email && message) {
            alert(`Thank you, ${name}! Your message has been sent.`);
            console.log(`Contact form submitted by ${name} (${email}): "${message}"`);
            this.reset(); // Reset the form fields
        } else {
            alert("Please fill in all fields before sending your message.");
            console.warn("Contact form submission attempted with incomplete fields.");
        }
    });
} else {
    console.warn("Contact form not found.");
}

/**
 * Handle Contribute Form Submission
 * Manages the submission of the contribute form.
 */
const contributeForm = document.getElementById('contribute-form');
if (contributeForm) {
    contributeForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const eventDate = document.getElementById('event-date').value;
        const eventTitle = document.getElementById('event-title').value.trim();
        const eventDescription = document.getElementById('event-description').value.trim();

        if (eventDate && eventTitle && eventDescription) {
            alert(`Thank you! Your event "${eventTitle}" has been submitted.`);
            console.log(`Event contributed: "${eventTitle}" on ${eventDate}`);
            this.reset(); // Reset the form fields
        } else {
            alert("Please fill in all fields before submitting your event.");
            console.warn("Contribute form submission attempted with incomplete fields.");
        }
    });
} else {
    console.warn("Contribute form not found.");
}

/**
 * Share via Email Button Functionality
 * Allows users to share the family timeline via email.
 */
const shareEmailButton = document.getElementById('share-email-button');
if (shareEmailButton) {
    shareEmailButton.addEventListener('click', () => {
        const subject = encodeURIComponent('Check out our Family Timeline!');
        const body = encodeURIComponent('Hi there,\n\nI wanted to share our family heritage website with you. It has our family timeline, photo gallery, and stories.\n\nCheck it out here: [Your Website URL]\n\nBest regards,\n[Your Name]');
        window.location.href = `mailto:?subject=${subject}&body=${body}`;
        console.log("Share via Email button clicked.");
    });
} else {
    console.warn("Share via Email button not found.");
}

/**
 * Handle Modals for Family Members
 * Dynamically creates modals for each family member and manages their interactions.
 */
document.addEventListener('DOMContentLoaded', () => {
    const familyMembers = [
        'janice', 'kent', 'vincent', 'jason', 'christopher',
        'gretchen', 'amelia', 'caitlin', 'callie', 'cole'
    ];

    const modalsContainer = document.getElementById('modals-container');
    const familyLinks = document.querySelectorAll('.family-list a');

    if (!modalsContainer) {
        console.error("Modals container not found.");
        return;
    }

    /**
     * Dynamically Create Modals for Each Family Member
     */
    familyMembers.forEach(member => {
        const modal = document.createElement('div');
        modal.className = 'modal';
        modal.id = `modal-${member}`;
        modal.innerHTML = `
            <div class="modal-content">
                <span class="close-modal" tabindex="0" role="button" aria-label="Close Modal">&times;</span>
                <iframe src="questionnaires/${member}.html" frameborder="0" class="questionnaire-iframe"></iframe>
                <button class="btn save-work-button" data-member="${member}">Save Work</button>
            </div>
        `;
        modalsContainer.appendChild(modal);
        console.log(`Created modal for ${member}`);
    });

    /**
     * Open Modal When a Family Member Link is Clicked
     */
    familyLinks.forEach(link => {
        link.addEventListener('click', event => {
            event.preventDefault();
            const member = link.getAttribute('data-member');
            const modal = document.getElementById(`modal-${member}`);
            if (modal) {
                modal.style.display = 'block';
                console.log(`Opened modal for ${member}`);
                restoreFormData(member);
            } else {
                console.error(`Modal with ID modal-${member} not found.`);
            }
        });
    });

    /**
     * Close Modal When "X" Button is Clicked
     */
    modalsContainer.addEventListener('click', event => {
        if (event.target.classList.contains('close-modal')) {
            const modal = event.target.closest('.modal');
            if (modal) {
                modal.style.display = 'none';
                console.log("Modal closed via 'X' button.");
            }
        }
    });

    /**
     * Close Modal When Clicking Outside Modal Content
     */
    modalsContainer.addEventListener('click', event => {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = 'none';
            console.log("Modal closed by clicking outside the content.");
        }
    });

    /**
     * Prevent Clicks Inside Modal Content from Closing the Modal
     */
    document.querySelectorAll('.modal-content').forEach(content => {
        content.addEventListener('click', event => {
            event.stopPropagation();
        });
    });

    /**
     * Close Modal When "Escape" Key is Pressed
     */
    window.addEventListener('keydown', event => {
        if (event.key === 'Escape') {
            document.querySelectorAll('.modal').forEach(modal => {
                if (modal.style.display === 'block') {
                    modal.style.display = 'none';
                    console.log("Modal closed via 'Escape' key.");
                }
            });
        }
    });

    /**
     * Handle "Save Work" Button Click
     * Saves the current state of the questionnaire to localStorage.
     */
    modalsContainer.addEventListener('click', event => {
        if (event.target.classList.contains('save-work-button')) {
            const member = event.target.getAttribute('data-member');
            saveFormData(member);
        }
    });

    /**
     * Save Form Data to LocalStorage
     * @param {string} member - The family member identifier
     */
    function saveFormData(member) {
        const iframe = document.querySelector(`#modal-${member} .questionnaire-iframe`);
        if (iframe && iframe.contentWindow) {
            const form = iframe.contentWindow.document.querySelector('form');
            if (form) {
                const formData = {};
                form.querySelectorAll('input, textarea, select').forEach(field => {
                    if (field.name) {
                        formData[field.name] = field.value;
                    }
                });
                localStorage.setItem(`form-${member}`, JSON.stringify(formData));
                alert("Your work has been saved!");
                console.log(`Form data for ${member} saved to localStorage.`);
            } else {
                console.error(`No form found inside iframe for ${member}.`);
            }
        } else {
            console.error(`Iframe for ${member} not accessible.`);
        }
    }

    /**
     * Restore Form Data from LocalStorage
     * @param {string} member - The family member identifier
     */
    function restoreFormData(member) {
        const savedData = JSON.parse(localStorage.getItem(`form-${member}`));
        if (savedData) {
            const iframe = document.querySelector(`#modal-${member} .questionnaire-iframe`);
            if (iframe && iframe.contentWindow) {
                // Wait for iframe to load
                iframe.onload = () => {
                    const form = iframe.contentWindow.document.querySelector('form');
                    if (form) {
                        Object.keys(savedData).forEach(key => {
                            const field = form.querySelector(`[name="${key}"]`);
                            if (field) {
                                field.value = savedData[key];
                                console.log(`Restored field "${key}" for ${member}.`);
                            }
                        });
                    } else {
                        console.error(`No form found inside iframe for ${member}.`);
                    }
                };
                // If iframe is already loaded
                if (iframe.contentDocument.readyState === 'complete') {
                    iframe.onload();
                }
            } else {
                console.error(`Iframe for ${member} not accessible.`);
            }
        } else {
            console.log(`No saved data found for ${member}.`);
        }
    }
});

/**
 * Additional Utility Functions (if needed)
 * These can be expanded based on future requirements.
 */

/**
 * Initialize Additional Features
 * Placeholder for any additional initialization logic.
 */
function initializeAdditionalFeatures() {
    // Placeholder for future features
    console.log("Initializing additional features...");
}

// Call the initialization function
initializeAdditionalFeatures();
