function editRegistration(id, dateOfInscription, grade, studentId, courseId) 
{
    const table = document.querySelector('table');
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>${id}</td>
        <td><input type="text" name="dateOfInscription" value="${dateOfInscription}" required></td>
        <td><input type="text" name="grade" value="${grade}" required></td>
        <td><input type="text" name="studentId" value="${studentId}" required></td>
        <td><input type="text" name="courseId" value="${courseId}" required></td>
        <td>
            <form action="update_registration.php" method="post" class="registration-form">
                <input type="hidden" name="id" value="${id}">
                <input type="hidden" name="dateOfInscription" class="dateOfInscription-hidden" value="${dateOfInscription}">
                <input type="hidden" name="grade" class="grade-hidden" value="${grade}">
                <input type="hidden" name="studentId" class="studentId-hidden" value="${studentId}">
                <input type="hidden" name="courseId" class="courseId-hidden" value="${courseId}">
                <input type="submit" value="Enregistrer">
            </form>
        </td>
        <td>
            <button type="button" onclick="this.closest('tr').remove();">Annuler</button>
        </td>`;
    const dateOfInscriptionInput = newRow.querySelector('input[name="dateOfInscription"]');
    const gradeInput = newRow.querySelector('input[name="grade"]');
    const studentIdInput = newRow.querySelector('input[name="studentId"]');
    const courseIdInput = newRow.querySelector('input[name="courseId"]');

    dateOfInscriptionInput.addEventListener('input', function() {
        newRow.querySelector('.dateOfInscription-hidden').value = this.value;
    });

    gradeInput.addEventListener('input', function() {
        newRow.querySelector('.grade-hidden').value = this.value;
    });

    studentIdInput.addEventListener('input', function() {
        newRow.querySelector('.studentId-hidden').value = this.value;
    });

    courseIdInput.addEventListener('input', function() {
        newRow.querySelector('.courseId-hidden').value = this.value;
    });

    table.appendChild(newRow);
}
