const { NodeSSH } = require('node-ssh');
const ssh = new NodeSSH();
async function fetchLogs() {
    try {
        await ssh.connect({
            host: '72.62.127.101',
            username: 'root',
            password: 'Address##00rtt',
            tryKeyboard: true
        });
        const result = await ssh.execCommand('tail -n 150 /var/www/myproject/storage/logs/laravel.log');
        console.log(result.stdout);
        if (result.stderr) console.error(result.stderr);
        ssh.dispose();
    } catch (err) {
        console.error(err);
        ssh.dispose();
    }
}
fetchLogs();
