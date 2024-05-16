</div>

<script src="js/bootstrap.min.js"></script>

<script>
    let keySequence = [];
    const desiredSequence = ['KeyG', 'KeyD', 'KeyL']; // Remplacez par votre séquence de touches

    window.addEventListener('keydown', (event) => {
        keySequence.push(event.code);

        if (keySequence.length > desiredSequence.length) {
            keySequence.shift();
        }

        if (JSON.stringify(keySequence) === JSON.stringify(desiredSequence)) {
            document.getElementById('secretText').style.display = 'block';
        }
    });
</script>

</body>
<footer>
    <p id="secretText" style="display: none;">vive codicam</p>
</footer>
</html>