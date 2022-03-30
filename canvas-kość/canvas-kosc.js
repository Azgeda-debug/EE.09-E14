let random = Math.round(Math.random()*5+1);

function randomize()
{
    if(random == 1)
    {
        one();
    }
    else if(random == 2)
    {
        two();
    }
    else if(random == 3)
    {
        three();
    }
    else if(random == 4)
    {
        four();
    }
    else if(random == 5)
    {
        five();
    }
    else if(random == 6)
    {
        six();
    }
}

const ctx = document.getElementById('canvas').getContext('2d');

function one()
{
    ctx.fillStyle = 'white';
    ctx.strokeRect(100,100,220,220);
    ctx.fillRect(100,100,220,220);
    ctx.fillStyle = 'black';
    ctx.beginPath();
    ctx.arc(210,210,20,0,2*Math.PI);
    ctx.stroke();
    ctx.fill();
}

function two()
{
    ctx.fillStyle = 'white';
    ctx.strokeRect(100,100,220,220);
    ctx.fillRect(100,100,220,220);
    ctx.fillStyle = 'black';
    ctx.beginPath();
    ctx.arc(267,267,20,0,2*Math.PI);
    ctx.stroke();
    ctx.fill();
    ctx.beginPath();
    ctx.arc(154,154,20,0,2*Math.PI);
    ctx.stroke();
    ctx.fill();
}

function three()
{
    ctx.fillStyle = 'white';
    ctx.strokeRect(100,100,220,220);
    ctx.fillRect(100,100,220,220);
    ctx.fillStyle = 'black';
    ctx.beginPath();
    ctx.arc(267,267,20,0,2*Math.PI);
    ctx.stroke();
    ctx.fill();
    ctx.beginPath();
    ctx.arc(210,210,20,0,2*Math.PI);
    ctx.stroke();
    ctx.fill();
    ctx.beginPath();
    ctx.arc(154,153,20,0,2*Math.PI);
    ctx.stroke();
    ctx.fill();
}

function four()
{
    ctx.fillStyle = 'white';
    ctx.strokeRect(100,100,220,220);
    ctx.fillRect(100,100,220,220);
    ctx.fillStyle = 'black';
    ctx.beginPath();
    ctx.arc(267,267,20,0,2*Math.PI);
    ctx.stroke();
    ctx.fill();
    ctx.beginPath();
    ctx.arc(154,267,20,0,2*Math.PI);
    ctx.stroke();
    ctx.fill();
    ctx.beginPath();
    ctx.arc(154,153,20,0,2*Math.PI);
    ctx.stroke();
    ctx.fill();
    ctx.beginPath();
    ctx.arc(267,153,20,0,2*Math.PI);
    ctx.fill();
    ctx.stroke();
}

function five()
{
    ctx.fillStyle = 'white';
    ctx.strokeRect(100,100,220,220);
    ctx.fillRect(100,100,220,220);
    ctx.fillStyle = 'black';
    ctx.beginPath();
    ctx.arc(267,267,20,0,2*Math.PI);
    ctx.stroke();
    ctx.fill();
    ctx.beginPath();
    ctx.arc(154,267,20,0,2*Math.PI);
    ctx.stroke();
    ctx.fill();
    ctx.beginPath();
    ctx.arc(154,153,20,0,2*Math.PI);
    ctx.stroke();
    ctx.fill();
    ctx.beginPath();
    ctx.arc(267,153,20,0,2*Math.PI);
    ctx.fill();
    ctx.stroke();
    ctx.beginPath();
    ctx.arc(210,210,20,0,2*Math.PI);
    ctx.fill();
    ctx.stroke();
}

function six()
{
    ctx.fillStyle = 'white';
    ctx.strokeRect(100,100,220,220);
    ctx.fillRect(100,100,220,220);
    ctx.fillStyle = 'black';
    ctx.beginPath();
    ctx.arc(267,267,20,0,2*Math.PI);
    ctx.stroke();
    ctx.fill();
    ctx.beginPath();
    ctx.arc(154,267,20,0,2*Math.PI);
    ctx.stroke();
    ctx.fill();
    ctx.beginPath();
    ctx.arc(154,153,20,0,2*Math.PI);
    ctx.stroke();
    ctx.fill();
    ctx.beginPath();
    ctx.arc(267,153,20,0,2*Math.PI);
    ctx.fill();
    ctx.stroke();
    ctx.beginPath();
    ctx.arc(154,210,20,0,2*Math.PI);
    ctx.fill();
    ctx.stroke();
    ctx.beginPath();
    ctx.arc(267,210,20,0,2*Math.PI);
    ctx.fill();
    ctx.stroke();
}