console.log("Questionnaire script loaded.");

/**
 * Questionnaire Data
 * This serves as the template for all questionnaires.
 */
const questionnaireData = [
    {
        sectionTitle: 'Personal Information',
        questions: [
            { id: 'fullName', label: 'Full Name:', type: 'text', placeholder: 'Enter your full name' },
            { id: 'preferredName', label: 'Preferred Name:', type: 'text', placeholder: 'Name you like to be called' },
            { id: 'birthOrder', label: 'Birth Order:', type: 'text', placeholder: 'e.g., First child, Second child' },
            { id: 'birthDate', label: 'Date of Birth:', type: 'date' },
            { id: 'birthTime', label: 'Time of Birth (optional):', type: 'time', placeholder: 'HH:MM' },
            { id: 'birthPlace', label: 'Place of Birth:', type: 'text', placeholder: 'City, State/Province, Country' }
        ]
    },
    {
        sectionTitle: 'Family Background',
        questions: [
            { id: 'familyHeritage', label: 'Family Heritage:', type: 'textarea', placeholder: 'Describe your family background and heritage' },
            { id: 'parents', label: 'Parents:', type: 'dynamic', entity: 'Parent' },
            { id: 'siblings', label: 'Siblings:', type: 'dynamic', entity: 'Sibling' },
            { id: 'grandparents', label: 'Grandparents:', type: 'dynamic', entity: 'Grandparent' }
        ]
    },
    {
        sectionTitle: 'Childhood and Early Years',
        questions: [
            { id: 'childhoodHome', label: 'Childhood Home:', type: 'textarea', placeholder: 'Describe your home and neighborhood' },
            { id: 'earlyMemories', label: 'Early Memories:', type: 'textarea', placeholder: 'Your earliest memories' },
            { id: 'familyTraditions', label: 'Family Traditions:', type: 'textarea', placeholder: 'Special traditions or routines' },
            { id: 'childhoodHobbies', label: 'Hobbies and Activities:', type: 'textarea', placeholder: 'Favorite hobbies or activities during childhood' },
            { id: 'pets', label: 'Pets:', type: 'textarea', placeholder: 'Describe any pets you had and their stories' }
        ]
    }
    // Add more sections as needed
];

/**
 * Generate Questionnaire Sections
 * Dynamically creates sections and questions based on the template.
 */
function generateQuestionnaire() {
    const form = document.getElementById('questionnaireForm');
    questionnaireData.forEach(section => {
        const sectionDiv = document.createElement('div');
        sectionDiv.className = 'section';

        // Section title
        const sectionTitle = document.createElement('h2');
        sectionTitle.textContent = section.sectionTitle;
        sectionDiv.appendChild(sectionTitle);

        // Questions
        section.questions.forEach(question => {
            const questionDiv = document.createElement('div');
            questionDiv.className = 'question';

            const label = document.createElement('label');
            label.textContent = question.label;
            questionDiv.appendChild(label);

            if (question.type === 'textarea') {
                const textarea = document.createElement('textarea');
                textarea.id = question.id;
                textarea.placeholder = question.placeholder || '';
                questionDiv.appendChild(textarea);
            } else {
                const input = document.createElement('input');
                input.type = question.type;
                input.id = question.id;
                input.placeholder = question.placeholder || '';
                questionDiv.appendChild(input);
            }

            // Add speech-to-text functionality
            addSpeechToText(questionDiv);

            sectionDiv.appendChild(questionDiv);
        });

        form.appendChild(sectionDiv);
    });
}

/**
 * Add Speech-to-Text Functionality
 * Adds a microphone button for inputs and textareas to capture voice input.
 */
function addSpeechToText(parentElement) {
    const micButton = document.createElement('button');
    micButton.textContent = '🎤';
    micButton.type = 'button';
    micButton.style.marginLeft = '10px';
    micButton.style.cursor = 'pointer';

    micButton.addEventListener('click', () => {
        const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
        recognition.lang = 'en-US';
        recognition.interimResults = false;
        recognition.maxAlternatives = 1;

        const input = parentElement.querySelector('input, textarea');
        if (!input) return;

        recognition.onresult = (event) => {
            input.value = event.results[0][0].transcript;
        };

        recognition.onerror = (event) => {
            console.error('Speech recognition error:', event.error);
        };

        recognition.start();
    });

    parentElement.appendChild(micButton);
}

/**
 * Handle Generate Narrative Button Click
 */
document.getElementById('generateNarrative').addEventListener('click', () => {
    const narrativeContent = document.getElementById('narrativeContent');
    let narrative = '';

    questionnaireData.forEach(section => {
        narrative += `<h2>${section.sectionTitle}</h2>`;
        section.questions.forEach(question => {
            const input = document.getElementById(question.id);
            if (input && input.value.trim()) {
                narrative += `<p><strong>${question.label}</strong> ${input.value}</p>`;
            }
        });
    });

    narrativeContent.innerHTML = narrative;
    document.getElementById('narrativeSection').style.display = 'block';
    document.getElementById('downloadPDF').style.display = 'inline-block';
});

/**
 * Handle Download PDF Button Click
 */
document.getElementById('downloadPDF').addEventListener('click', () => {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    const narrativeContent = document.getElementById('narrativeContent');

    doc.html(narrativeContent, {
        callback: function (doc) {
            doc.save('Narrative.pdf');
        }
    });
});

// Initialize the questionnaire
generateQuestionnaire();
