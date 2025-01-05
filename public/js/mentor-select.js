document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.mentor-option').forEach(option => {
        option.addEventListener('click', function () {
            // メンターIDを隠しフィールドに設定
            document.getElementById('mentor_id').value = this.dataset.id;

            // 選択状態のスタイルをリセット
            document.querySelectorAll('.mentor-option').forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
        });
    });
});
