//------------------------------------------GroundJoint-Class-----------------------------------------------------------//
function GroundJoint(){
	//Constructor (x,y,'fixed')
	if (arguments.length==2){
		this.x=arguments[0];
		this.y=arguments[1];
		this.fixed=true;
		this.shape = GroundJoint(this.x,this.y);
	} else if(arguments.length==3){
		this.x=arguments[0];
		this.y=arguments[1];
		//Boolean value for fixed. If false is necessary know the degree inclination value. 
		this.fixed=false;
		this.slope=arguments[2];
		this.shape = floatJoint(this.x,this.y);
	}else if (arguments.length ==1 && arguments[0] instanceof Object){
		this.copy(arguments[0]);
	}
}
GroundJoint.prototype.copy = function (copyJoint){
	this.x=copyJoint.x;
	this.y=copyJoint.y;

	for(var key in copyJoint) {
		if (copyJoint[key] instanceof String){
			//eval('this.'+key+ ' = '+addslashes(copyJoint[key]));
			console.log ('String');
		}else{
			console.log (typeof(copyJoint[key])+' '+ key+' : '+copyJoint[key]);
			console.log('this.'+key+ ' = '+copyJoint[key]);
			eval('this.'+addslashes(key)+ ' = '+addslashes(copyJoint[key]));
		}
	}
}

GroundJoint.prototype.add= function (two){
    if (two instanceof Object){
        two.add(this.shape);
    }else{
        console.log('Error, the input parameter is not a frame from two.js');
    }
}

      function GroundJoint(x,y){
        var joint =  two.makeCircle(x ,y , 5);
        side=15; //Triangle side length
        var triangle = two.makePolygon(x, y, x+side/2, y+side, x-side/2, y+side, false);
        line_l=5;
        hol=3; // Holgura
        sep = side +hol; // separacion
        l=line_l/Math.sqrt(2);
        var line = two.makeLine(x+l, y+sep, x-l, y+sep+2*l);
        var line2 = line.clone();
        val_x=5;
        var vector = new Two.Vector(val_x, 0);
        line2.translation.add(line2.translation,vector);
        vector = new Two.Vector(-val_x, 0);
        var line3 = line.clone();
        line3.translation.add(line3.translation,vector);
        var group = new Two.Group();
        var centroid = new Two.Vector(x, y);

        group.add(joint,triangle,line,line2,line3);
        return group;
      }

      function floatJoint(x,y){
        var joint =  two.makeCircle(x ,y , 5);
        side=15; //Triangle side length
        var rectangle = two.makeRectangle(x, y, 2*side,side);
        line_l=5;
        hol=3; // Holgura
        sep = side/2 +hol; // separacion
        l=line_l/Math.sqrt(2);
        var line = two.makeLine(x+l, y+sep, x-l, y+sep+2*l);
        var line2 = line.clone();
        val_x=7;
        var vector = new Two.Vector(val_x, 0);
        line2.translation.add(line2.translation,vector);
        vector = new Two.Vector(-val_x, 0);
        var line3 = line.clone();
        line3.translation.add(line3.translation,vector);
        var group = new Two.Group();
        var centroid = new Two.Vector(x, y);

        group.add(rectangle,joint,line,line2,line3);
        return group;
      }