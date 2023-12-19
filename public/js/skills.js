const skills = document.querySelectorAll('.skill');

skills.forEach(skill => {
  skill.addEventListener('click', () => {
    if (skill.classList.contains('selected')) {
      // If already selected, remove 'selected' class and restore original size
      skill.classList.remove('selected');
      skill.style.removeProperty('order');
      skill.style.removeProperty('height');
      return;
    }

    // Remove 'selected' class and styles from all skills
    skills.forEach(s => {
      s.classList.remove('selected');
      s.style.removeProperty('order');
      s.style.removeProperty('height');
    });

    // Add 'selected' class to the clicked skill
    skill.classList.add('selected');

    // Move the clicked skill to the top of the container
    skill.parentNode.prepend(skill);

    // Apply styles to the selected skill
    skill.style.order = '-1';
    skill.style.height = '100%';

    // Scroll the container to the top of the clicked skill
    skill.scrollIntoView({ behavior: 'smooth', block: 'start' });
  });
});
