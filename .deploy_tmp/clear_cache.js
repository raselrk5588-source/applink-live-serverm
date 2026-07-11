const { NodeSSH } = require('node-ssh');
const ssh = new NodeSSH();
async function clearCache() {
    try {
        await ssh.connect({
            host: '72.62.127.101',
            username: 'root',
            password: 'Address##00rtt',
            tryKeyboard: true
        });
        const result = await ssh.execCommand('php artisan route:clear && php artisan config:clear', { cwd: '/var/www/myproject' });
        console.log('STDOUT:', result.stdout);
        console.log('STDERR:', result.stderr);
        ssh.dispose();
    } catch (err) {
        console.error(err);
        ssh.dispose();
    }
}
clearCache();
