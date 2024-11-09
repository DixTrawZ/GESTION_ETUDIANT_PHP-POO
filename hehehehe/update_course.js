function editCourse(id, name, description, credits, teacherId) 
{
    const table = document.querySelector('table');
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>${id}</td>
        <td><input type="text" name="name" value="${name}" required></td>
        <td><input type="text" name="description" value="${description}" required></td>
        <td><input type="text" name="credits" value="${credits}" required></td>
        <td><input type="text" name="teacherId" value="${teacherId}" required></td>
        <td>
            <form action="update_course.php" method="post" class="course-form">
                <input type="hidden" name="id" value="${id}">
                <input type="hidden" name="name" class="name-hidden" value="${name}">
                <input type="hidden" name="description" class="description-hidden" value="${description}">
                <input type="hidden" name="credits" class="credits-hidden" value="${credits}">
                <input type="hidden" name="teacherId" class="teacherId-hidden" value="${teacherId}">
                <input type="submit" value="Enregistrer">
            </form>
        </td>
        <td>
            <button type="button" onclick="this.closest('tr').remove();">Annuler</button>
        </td>`;
    
    const nameInput = newRow.querySelector('input[name="name"]');
    const descriptionInput = newRow.querySelector('input[name="description"]');
    const creditsInput = newRow.querySelector('input[name="credits"]');
    const teacherIdInput = newRow.querySelector('input[name="teacherId"]');

    nameInput.addEventListener('input', function() {
        newRow.querySelector('.name-hidden').value = this.value;
    });

    descriptionInput.addEventListener('input', function() {
        newRow.querySelector('.description-hidden').value = this.value;
    });

    creditsInput.addEventListener('input', function() {
        newRow.querySelector('.credits-hidden').value = this.value;
    });

    teacherIdInput.addEventListener('input', function() {
        newRow.querySelector('.teacherId-hidden').value = this.value;
    });

    table.appendChild(newRow);
}
