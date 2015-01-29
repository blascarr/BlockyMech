<script>

        $(function() {

          var type = /(canvas|webgl)/.test(url.type) ? url.type : 'svg';
          var two = new Two({
            type: Two.Types[type],
            fullscreen: true
          }).appendTo(document.body);

          var cross = makeCross(two);
          cross.fill = 'rgba(0, 191, 168, 0.33)';
          cross.stroke = 'rgb(0, 191, 168)';
          cross.linewidth = 5;
          cross.translation.set(- two.width / 2, two.height / 2);
          cross.shell.translation.copy(cross.translation);

          var t1 = new TWEEN.Tween(cross.translation)
            .to({
              x: two.width / 2
            }, 750)
            .delay(500)
            .easing(TWEEN.Easing.Bounce.Out)
            .onUpdate(function(t) {
              cross.rotation = Math.PI * 2 * t;
              cross.shell.translation.copy(cross.translation);
            })
            .onComplete(function() {
              t2.start();
            })
            .start();
          var t2 = new TWEEN.Tween(cross.translation)
            .to({
              x: two.width * 1.5
            }, 750)
            .delay(500)
            .easing(TWEEN.Easing.Elastic.In)
            .onUpdate(function(t) {
              cross.rotation = Math.PI * 2 * t;
              cross.shell.translation.copy(cross.translation);
            })
            .onComplete(function() {
              cross.translation.x = - two.width / 2;
              t1.start();
            })

          two.bind('update', function() {

            TWEEN.update();

          }).play();

        });

        function makeCross(two) {

          var longer = two.width > two.height;

          var width = (longer ? two.height : two.width) / 8;
          var height = (longer ? two.width : two.height) / 3;

          var a = two.makeRectangle(0, 0, width, height);
          var b = a.clone();
          b.rotation = Math.PI / 2;

          var shadow = two.makeRectangle(0, height / 2 + 2.5, height, 5);
          shadow.fill = '#efefef';
          shadow.noStroke();

          var shell = two.makeGroup(shadow);

          var group = two.makeGroup(a, b);
          group.shell = shell;

          return group;

        }

      </script>