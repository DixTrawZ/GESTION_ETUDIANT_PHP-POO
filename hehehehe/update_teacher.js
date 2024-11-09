function editTeacher(id, lastName, firstName, specialty, courseList) 
{
    const table = document.querySelector('table'); 
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>${id}</td>
        <td><input type="text" name="lastName" value="${lastName}" required></td>
        <td><input type="text" name="firstName" value="${firstName}" required></td>
        <td><input type="text" name="specialty" value="${specialty}" required></td>
        <td><input type="text" name="courseList" value="${courseList}" required></td>
        <td>
            <form action="update_teacher.php" method="post" class="teacher-form">
                <input type="hidden" name="id" value="${id}">
                <input type="hidden" name="lastName" class="lastName-hidden" value="${lastName}">
                <input type="hidden" name="firstName" class="firstName-hidden" value="${firstName}">
                <input type="hidden" name="specialty" class="specialty-hidden" value="${specialty}">
                <input type="hidden" name="courseList" class="courseList-hidden" value="${courseList}">
                <input type="submit" value="Enregistrer">
            </form>
        </td>
        <td><button type="button" onclick="this.closest('tr').remove();">Annuler</button></td>
    `;
    const lastNameInput = newRow.querySelector('input[name="lastName"]');
    const firstNameInput = newRow.querySelector('input[name="firstName"]');
    const specialtyInput = newRow.querySelector('input[name="specialty"]');
    const courseListInput = newRow.querySelector('input[name="courseList"]');

    lastNameInput.addEventListener('input', function() {
        newRow.querySelector('.lastName-hidden').value = this.value;
    });

    firstNameInput.addEventListener('input', function() {
        newRow.querySelector('.firstName-hidden').value = this.value;
    });

    specialtyInput.addEventListener('input', function() {
        newRow.querySelector('.specialty-hidden').value = this.value;
    });

    courseListInput.addEventListener('input', function() {
        newRow.querySelector('.courseList-hidden').value = this.value;
    });

    table.appendChild(newRow);
}
