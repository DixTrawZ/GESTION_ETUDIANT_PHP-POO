function editStudent(id, lastName, firstName, dateOfBirth, registrationList) 
{
    const table = document.querySelector('table'); 
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>${id}</td>
        <td><input type="text" name="lastName" value="${lastName}" required></td>
        <td><input type="text" name="firstName" value="${firstName}" required></td>
        <td><input type="text" name="dateOfBirth" value="${dateOfBirth}" required></td>
        <td><input type="text" name="registrationList" value="${registrationList}" required></td>
        <td>
            <form action="update_etudiant.php" method="post" class="student-form">
                <input type="hidden" name="id" value="${id}">
                <input type="hidden" name="lastName" class="lastName-hidden" value="${lastName}">
                <input type="hidden" name="firstName" class="firstName-hidden" value="${firstName}">
                <input type="hidden" name="dateOfBirth" class="dateOfBirth-hidden" value="${dateOfBirth}">
                <input type="hidden" name="registrationList" class="registrationList-hidden" value="${registrationList}">
                <input type="submit" value="Enregistrer">
            </form>
        </td>
        <td><button type="button" onclick="this.closest('tr').remove();">Annuler</button></td>
    `;
    const lastNameInput = newRow.querySelector('input[name="lastName"]');
    const firstNameInput = newRow.querySelector('input[name="firstName"]');
    const dateOfBirthInput = newRow.querySelector('input[name="dateOfBirth"]');
    const registrationListInput = newRow.querySelector('input[name="registrationList"]');

    lastNameInput.addEventListener('input', function() {
        newRow.querySelector('.lastName-hidden').value = this.value;
    });

    firstNameInput.addEventListener('input', function() {
        newRow.querySelector('.firstName-hidden').value = this.value;
    });

    dateOfBirthInput.addEventListener('input', function() {
        newRow.querySelector('.dateOfBirth-hidden').value = this.value;
    });

    registrationListInput.addEventListener('input', function() {
        newRow.querySelector('.registrationList-hidden').value = this.value;
    });

    table.appendChild(newRow);
}
