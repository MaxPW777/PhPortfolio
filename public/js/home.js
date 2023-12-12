const Github = document.querySelector('.Github');
const GithubImage = document.getElementById('githubImage');

Github.addEventListener('mouseover', () => {
    GithubImage.src = 'assets/github-mark.svg';
});
Github.addEventListener('mouseout', () => {
    GithubImage.src = 'assets/github-mark-white.svg';
});
