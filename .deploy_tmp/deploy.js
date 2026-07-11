const { NodeSSH } = require('node-ssh');
const ssh = new NodeSSH();

async function deploy() {
    try {
        console.log('Connecting to server...');
        await ssh.connect({
            host: '72.62.127.101',
            username: 'root',
            password: 'Address##00rtt',
            tryKeyboard: true,
        });
        
        console.log('Connected! Uploading files...');
        
        const localPath = 'e:/server/Archive';
        const remotePath = '/var/www/myproject';
        
        const filesToUpload = [
            {
                local: `${localPath}/app/Http/Controllers/API/UssdSubscriptionController.php`,
                remote: `${remotePath}/app/Http/Controllers/API/UssdSubscriptionController.php`
            }
        ];

        for (const file of filesToUpload) {
            console.log(`Uploading ${file.local} to ${file.remote}...`);
            await ssh.putFile(file.local, file.remote);
            console.log('Done.');
        }

        console.log('Deployment successful!');
        ssh.dispose();
    } catch (error) {
        console.error('Error during deployment:', error);
        ssh.dispose();
        process.exit(1);
    }
}

deploy();
