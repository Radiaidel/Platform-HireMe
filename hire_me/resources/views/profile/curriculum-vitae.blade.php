<x-app-layout>
    <section>

        <div id="cv-form">
            <!-- Compétences -->
            <div class="form-group">
                <label for="competence-category">Catégorie:</label>
                <input type="text" id="competence-category" class="form-control" placeholder="Catégorie de compétence (backend, frontend, etc.)">
                <label for="competence-technologies">Technologies:</label>
                <input type="text" id="competence-technologies" class="form-control" placeholder="Technologies associées (PHP, Laravel, HTML, CSS, etc.)">
                <button onclick="addCompetence()">+</button>
                <div id="competence-info"></div>
            </div>
            <!-- Expériences professionnelles -->
            <div class="form-group">
                <label for="experience-job">Poste:</label>
                <input type="text" id="experience-job" class="form-control" placeholder="Poste occupé">
                <label for="experience-company">Entreprise:</label>
                <input type="text" id="experience-company" class="form-control" placeholder="Nom de l'entreprise">
                <label for="experience-location">Lieu:</label>
                <input type="text" id="experience-location" class="form-control" placeholder="Lieu de travail">
                <label for="experience-start-date">Date début:</label>
                <input type="date" id="experience-start-date" class="form-control">
                <label for="experience-end-date">Date fin:</label>
                <input type="date" id="experience-end-date" class="form-control">
                <button onclick="addExperience()">+</button>
                <div id="experience-info"></div>
            </div>
            <!-- Cursus éducatifs -->
            <div class="form-group">
                <label for="education-school">École:</label>
                <input type="text" id="education-school" class="form-control" placeholder="Nom de l'école">
                <label for="education-location">Lieu:</label>
                <input type="text" id="education-location" class="form-control" placeholder="Lieu de l'école">
                <label for="education-start-date">Date début:</label>
                <input type="date" id="education-start-date" class="form-control">
                <label for="education-end-date">Date fin:</label>
                <input type="date" id="education-end-date" class="form-control">
                <button onclick="addEducation()">+</button>
                <div id="education-info"></div>
            </div>
            <!-- Langues maîtrisées -->
            <div class="form-group">
                <label for="language-name">Langue:</label>
                <input type="text" id="language-name" class="form-control" placeholder="Nom de la langue">
                <label for="language-level">Niveau:</label>
                <input type="text" id="language-level" class="form-control" placeholder="Niveau de maîtrise">
                <button onclick="addLanguage()">+</button>
                <div id="language-info"></div>
            </div>
        </div>

    </section>
    <script>
        // Tableau pour stocker les informations du CV
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
            newInfo.textContent = JSON.stringify(info);
            infoContainer.appendChild(newInfo);
        }

        function clearInput(inputIds) {
            inputIds.forEach(id => {
                document.getElementById(id).value = '';
            });
        }
    </script>
</x-app-layout>