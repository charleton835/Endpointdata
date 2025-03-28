// Quiz questions and scoring system
const questions = [
    {
        id: 'org-size',
        question: 'How many employees does your organization have?',
        options: [
            {
                text: '1-50 employees',
                score: { enterprise: 0, smallBusiness: 10, government: 0 }
            },
            {
                text: '51-500 employees',
                score: { enterprise: 5, smallBusiness: 5, government: 5 }
            },
            {
                text: '500+ employees',
                score: { enterprise: 10, smallBusiness: 0, government: 8 }
            }
        ]
    },
    {
        id: 'compliance',
        question: 'What compliance requirements does your organization need to meet?',
        options: [
            {
                text: 'Basic industry standards',
                score: { enterprise: 3, smallBusiness: 10, government: 0 }
            },
            {
                text: 'SOC 2 and ISO 27001',
                score: { enterprise: 8, smallBusiness: 5, government: 5 }
            },
            {
                text: 'FedRAMP, FIPS, or other government standards',
                score: { enterprise: 5, smallBusiness: 0, government: 10 }
            }
        ]
    },
    {
        id: 'infrastructure',
        question: 'What best describes your IT infrastructure?',
        options: [
            {
                text: 'Mostly cloud-based',
                score: { enterprise: 5, smallBusiness: 10, government: 0 }
            },
            {
                text: 'Hybrid (cloud and on-premise)',
                score: { enterprise: 10, smallBusiness: 5, government: 5 }
            },
            {
                text: 'Primarily on-premise/air-gapped',
                score: { enterprise: 5, smallBusiness: 0, government: 10 }
            }
        ]
    }
];

let currentQuestion = 0;
const scores = {
    enterprise: 0,
    smallBusiness: 0,
    government: 0
};

function startQuiz() {
    currentQuestion = 0;
    scores.enterprise = 0;
    scores.smallBusiness = 0;
    scores.government = 0;
    showQuestion();
}

function showQuestion() {
    const quizContainer = document.getElementById('quiz');
    const question = questions[currentQuestion];
    
    let html = `
        <div class="question-container">
            <h2>Question ${currentQuestion + 1} of ${questions.length}</h2>
            <p class="question">${question.question}</p>
            <div class="options">
    `;
    
    question.options.forEach((option, index) => {
        html += `
            <button class="option-btn" onclick="selectOption(${index})">
                ${option.text}
            </button>
        `;
    });
    
    html += `</div></div>`;
    quizContainer.innerHTML = html;
}

function selectOption(optionIndex) {
    const question = questions[currentQuestion];
    const option = question.options[optionIndex];
    
    // Update scores
    scores.enterprise += option.score.enterprise;
    scores.smallBusiness += option.score.smallBusiness;
    scores.government += option.score.government;

    if (currentQuestion < questions.length - 1) {
        currentQuestion++;
        showQuestion();
    } else {
        showLoadingAndRedirect();
    }
}

function showLoadingAndRedirect() {
    const quizContainer = document.getElementById('quiz');
    quizContainer.innerHTML = `
        <div class="result-container">
            <h2>Analysis Complete!</h2>
            <p>Based on your answers, we're finding the best security solution for you...</p>
            <div class="loader"></div>
        </div>
    `;
    
    // Determine the highest score and redirect accordingly
    const maxScore = Math.max(scores.enterprise, scores.smallBusiness, scores.government);
    let redirectPath;
    
    if (scores.government === maxScore) {
        redirectPath = 'GovernmentSecurity.php';
    } else if (scores.enterprise === maxScore) {
        redirectPath = 'EnterpriseSecurity.php';
    } else {
        redirectPath = 'SmallBusinessSecurity.php';
    }
    
    // Redirect after a short delay
    setTimeout(() => {
        window.location.href = redirectPath;
    }, 2000);
}

// Initialize quiz when DOM is loaded
document.addEventListener('DOMContentLoaded', startQuiz);