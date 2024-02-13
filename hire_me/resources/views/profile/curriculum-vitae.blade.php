<x-app-layout>
    <section class="max-w-3xl mx-auto py-6 px-4">
        <!-- Compétences -->

        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Compétences</h2>
                <button onclick="addCompetence()" class="p-2 rounded-full bg-blue-500 text-white hover:bg-blue-600 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </button>
            </div>
            <div>
                <input type="text" id="competence-category" class="form-input w-full rounded-md shadow-sm mb-2" placeholder="Catégorie de compétence (backend, frontend, etc.)">
                <input type="text" id="competence-technologies" class="form-input w-full rounded-md shadow-sm mb-2" placeholder="Technologies associées (PHP, Laravel, HTML, CSS, etc.)">
            </div>
            <div id="competence-info"></div>
        </div>

        <!-- Expériences professionnelles -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Expériences professionnelles</h2>
                <button onclick="addExperience()" class="p-2 rounded-full bg-blue-500 text-white hover:bg-blue-600 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </button>
            </div>
            <div>
                <input type="text" id="experience-job" class="form-input w-full rounded-md shadow-sm mb-2" placeholder="Poste occupé">
                <input type="text" id="experience-company" class="form-input w-full rounded-md shadow-sm mb-2" placeholder="Nom de l'entreprise">
                <input type="text" id="experience-location" class="form-input w-full rounded-md shadow-sm mb-2" placeholder="Lieu de travail">
                <input type="date" id="experience-start-date" class="form-input w-full rounded-md shadow-sm mb-2">
                <input type="date" id="experience-end-date" class="form-input w-full rounded-md shadow-sm mb-2">
            </div>
            <div id="experience-info"></div>
        </div>

        <!-- Cursus éducatifs -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Cursus éducatifs</h2>
                <button onclick="addEducation()" class="p-2 rounded-full bg-blue-500 text-white hover:bg-blue-600 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </button>
            </div>
            <div>
                <input type="text" id="education-school" class="form-input w-full rounded-md shadow-sm mb-2" placeholder="Nom de l'école">
                <input type="text" id="education-location" class="form-input w-full rounded-md shadow-sm mb-2" placeholder="Lieu de l'école">
                <input type="date" id="education-start-date" class="form-input w-full rounded-md shadow-sm mb-2">
                <input type="date" id="education-end-date" class="form-input w-full rounded-md shadow-sm mb-2">
            </div>
            <div id="education-info"></div>
        </div>

        <!-- Langues maîtrisées -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Langues maîtrisées</h2>
                <button onclick="addLanguage()" class="p-2 rounded-full bg-blue-500 text-white hover:bg-blue-600 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </button>
            </div>
            <div>
                <input type="text" id="language-name" class="form-input w-full rounded-md shadow-sm mb-2" placeholder="Nom de la langue">
                <input type="text" id="language-level" class="form-input w-full rounded-md shadow-sm mb-2" placeholder="Niveau de maîtrise">
            </div>
            <div id="langue-info"></div>
        </div>
        <button onclick="saveCV()" class="p-2 rounded-full bg-green-500 text-white hover:bg-green-600 focus:outline-none mt-4">
            Enregistrer le CV
        </button>

    </section>
</x-app-layout>

<script>
    let cvData = {
        competence: [],
        experience: [],
        education: [],
        langue: []
    };

    function addCompetence() {
        const category = document.getElementById('competence-category').value;
        const technologies = document.getElementById('competence-technologies').value;

        if (category.trim() !== '' && technologies.trim() !== '') {
            const competence = {
                category,
                technologies
            };
            cvData.competence.push(competence);
            displayInfo('competence', competence);
            clearInput(['competence-category', 'competence-technologies']);
        } else {
            alert('Veuillez saisir la catégorie de compétence et les technologies associées.');
        }
    }

    function addExperience() {
        const job = document.getElementById('experience-job').value;
        const company = document.getElementById('experience-company').value;
        const location = document.getElementById('experience-location').value;
        const startDate = document.getElementById('experience-start-date').value;
        const endDate = document.getElementById('experience-end-date').value;

        if (job.trim() !== '' && company.trim() !== '' && location.trim() !== '' && startDate !== '' && endDate !== '') {
            cvData.experience.push({
                job,
                company,
                location,
                startDate,
                endDate
            });
            displayInfo('experience', {
                job,
                company,
                location,
                startDate,
                endDate
            });
            clearInput(['experience-job', 'experience-company', 'experience-location', 'experience-start-date', 'experience-end-date']);
        } else {
            alert('Veuillez remplir tous les champs de l\'expérience professionnelle.');
        }
    }

    function addEducation() {
        const school = document.getElementById('education-school').value;
        const location = document.getElementById('education-location').value;
        const startDate = document.getElementById('education-start-date').value;
        const endDate = document.getElementById('education-end-date').value;

        if (school.trim() !== '' && location.trim() !== '' && startDate !== '' && endDate !== '') {
            cvData.education.push({
                school,
                location,
                startDate,
                endDate
            });
            displayInfo('education', {
                school,
                location,
                startDate,
                endDate
            });
            clearInput(['education-school', 'education-location', 'education-start-date', 'education-end-date']);
        } else {
            alert('Veuillez remplir tous les champs du cursus éducatif.');
        }
    }

    function addLanguage() {
        const name = document.getElementById('language-name').value;
        const level = document.getElementById('language-level').value;

        if (name.trim() !== '' && level.trim() !== '') {
            cvData.langue.push({
                name,
                level
            });
            displayInfo('langue', {
                name,
                level
            });
            clearInput(['language-name', 'language-level']);
        } else {
            alert('Veuillez saisir le nom et le niveau de la langue.');
        }
    }

    function displayInfo(field, info) {
        const infoContainer = document.getElementById(`${field}-info`);
        const newInfo = document.createElement('p');
        if (field === 'competence') {
            newInfo.textContent = `${info.category}: ${info.technologies}`;
        } else if (field === 'experience') {
            newInfo.textContent = `${info.job} chez ${info.company} (${info.location}) - ${info.startDate} à ${info.endDate}`;
        } else if (field === 'education') {
            newInfo.textContent = `${info.school} (${info.location}) - ${info.startDate} à ${info.endDate}`;
        } else if (field === 'langue') {
            newInfo.textContent = `${info.name} - Niveau: ${info.level}`;
        }
        newInfo.classList.add('border', 'border-gray-300', 'rounded-md', 'p-2', 'mb-2', 'flex', 'justify-between', 'items-center');
        const deleteButton = document.createElement('button');
        deleteButton.innerHTML = '<svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M12.0004 9.5L17.0004 14.5M17.0004 9.5L12.0004 14.5M4.50823 13.9546L7.43966 17.7546C7.79218 18.2115 7.96843 18.44 8.18975 18.6047C8.38579 18.7505 8.6069 18.8592 8.84212 18.9253C9.10766 19 9.39623 19 9.97336 19H17.8004C18.9205 19 19.4806 19 19.9084 18.782C20.2847 18.5903 20.5907 18.2843 20.7824 17.908C21.0004 17.4802 21.0004 16.9201 21.0004 15.8V8.2C21.0004 7.0799 21.0004 6.51984 20.7824 6.09202C20.5907 5.71569 20.2847 5.40973 19.9084 5.21799C19.4806 5 18.9205 5 17.8004 5H9.97336C9.39623 5 9.10766 5 8.84212 5.07467C8.6069 5.14081 8.38579 5.2495 8.18975 5.39534C7.96843 5.55998 7.79218 5.78846 7.43966 6.24543L4.50823 10.0454C3.96863 10.7449 3.69883 11.0947 3.59505 11.4804C3.50347 11.8207 3.50347 12.1793 3.59505 12.5196C3.69883 12.9053 3.96863 13.2551 4.50823 13.9546Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </svg>';
        deleteButton.addEventListener('click', () => deleteItem(field, infoContainer, info));
        newInfo.appendChild(deleteButton);
        infoContainer.appendChild(newInfo);
    }

    function clearInput(inputIds) {
        inputIds.forEach(id => {
            document.getElementById(id).value = '';
        });
    }

    function deleteItem(field, container, item) {
        const index = cvData[field].indexOf(item);
        if (index !== -1) {
            cvData[field].splice(index, 1);
            container.removeChild(container.children[index]);
        }
    }


    function saveCV() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/save-cv');
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log('CV enregistré avec succès !');
            } else {
                console.error('Erreur lors de l\'enregistrement du CV');
            }
        };
        xhr.send(JSON.stringify(cvData));
    }
</script>