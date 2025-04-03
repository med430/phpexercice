const canvas = document.querySelector("#canvas");
const ctx = canvas.getContext("2d");

const WIDTH = canvas.width = window.innerWidth;
const HEIGHT = canvas.height = window.innerHeight;

function colorCoord(cX, cY, cZ, cT) {
    return "rgba(" + cX + ", " + cY + ", " + cZ + ", " + cT + ")";
}

class Star {
    constructor(x, y, color) {
        this.x = x;
        this.y = y;
        this.luminosity = Math.random();
        this.radius = Math.random()*2;
        this.luminousRadius = this.radius * this.luminosity;
        this.color = color;
    }

    calculateLuminosity() {
        return 0.75 + Math.abs(Math.sin(Date.now() / 100000)) * 0.25;
    }

    update() {
        this.luminosity = this.calculateLuminosity();
        this.luminousRadius = this.radius * this.luminosity;
    }
    draw() {
        for(let i = 1; i<=5; i++) {
            ctx.fillStyle = "rgba(" + this.color[0] + ", " + this.color[1] + ", " + this.color[2] + ", " + this.luminosity + ")";
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.luminousRadius * i / 5, 0, Math.PI * 2);
            ctx.fill();
        }
    }
}

class Galaxy {
    constructor(x, y, radius, nbPoints) {
        this.x = x;
        this.y = y;
        this.radius = radius;
        this.nbPoints = nbPoints;
        this.stars = this.createStars();
    }

    createStars() {
        let stars = [];
        let x0 = this.x;
        let y0 = this.y;
        let angle = 0;
        for(let i = 1; i<=this.nbPoints; i++) {
            let density = 1;
            let radius = this.radius * i / this.nbPoints;
            let x = x0 + Math.cos(angle + Math.PI/4) * radius;
            let y = y0 + Math.sin(angle) * radius;
            angle += 0.04;
            for(let j = 1; j<=density; j++) {
                let dx = Math.random() * 0.025 * this.radius;
                let dy = Math.random() * 0.025 * this.radius;
                let distanceFactor = radius/this.radius;
                let cX = 255;
                let cY = 255;
                let cZ = 255;
                let color = [Math.floor((1 - radius/this.radius) * cX), Math.floor((1 - radius/this.radius) * cY), Math.floor((1 - radius/this.radius) * cZ)];
                stars.push(new Star(x + dx, y + dy, color));
            }
        }
        return stars;
    }

    update() {
        this.stars.forEach(star=> {
            star.update();
        });
    }

    draw() {
        this.drawSpiralArms();
        this.drawGalaxyCore();
        this.stars.forEach(star=> {
            star.draw();
        });
    }

    drawGalaxyCore() {
        let gradient = ctx.createRadialGradient(this.x, this.y, 0, this.x, this.y, this.radius/10);
        gradient.addColorStop(0, "rgba(255, 255, 180, 1)");  // Bright yellow center
        gradient.addColorStop(0.3, "rgba(255, 200, 100, 0.8)");
        gradient.addColorStop(0.6, "rgba(255, 150, 50, 0.4)");
        gradient.addColorStop(1, "rgba(0, 0, 0, 0)"); // Fades into space
    
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radius/10, 0, Math.PI * 2);
        ctx.fillStyle = gradient;
        ctx.fill();
    }

    drawSpiralArms() {
        let numArms = 2;
        for (let i = 0; i < numArms; i++) {
            for(let cAngle = 0; cAngle<Math.PI/8; cAngle+=0.04) {
                ctx.beginPath();
            let cX = 160;
            let cY = 80;
            let cZ = 255;
            let cT = 0.1;
            ctx.strokeStyle = `rgba(160, 80, 255, 0.1)`; // Soft purple
            ctx.lineWidth = 2;
            ctx.shadowColor = "rgba(160, 80, 255, 0.4)";
            ctx.shadowBlur = 10;
    
            for (let t = 0; t < 200; t++) {
                let angle = (t / 200) * Math.PI * 4 + (i * (Math.PI * 2 / numArms)) + cAngle;
                let radius = (t / 200) * 300;
                let x = this.x + Math.cos(angle + Math.PI/4) * radius;
                let y = this.y + Math.sin(angle) * radius;
                if (t === 0) ctx.moveTo(x, y);
                else ctx.lineTo(x, y);
            }
    
            ctx.stroke();
            }
        }
    }    
}

class Universe {
    constructor() {
        this.galaxies = this.createGalaxies();
    }

    createGalaxies() {
        let galaxies = [];
        let x = WIDTH/2;
        let y = HEIGHT/2;
        let radius = 500;
        let nbPoints = 1000;
        galaxies.push(new Galaxy(x, y, radius, nbPoints));
        return galaxies;
    }

    update() {
        this.galaxies.forEach(galaxy => galaxy.draw());
    }

    draw() {
        this.galaxies.forEach(galaxy => galaxy.draw());
    }
}

universe = new Universe();

function animate() {
    ctx.clearRect(0, 0, WIDTH, HEIGHT);
    universe.update();
    universe.draw();
    setTimeout(100, () => {
        requestAnimationFrame(animate);
    });
}

animate();