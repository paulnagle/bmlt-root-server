resource "aws_ecs_task_definition" "bmlt_unstable" {
  family        = "bmlt-unstable"
  task_role_arn = aws_iam_role.ecs_task_role.arn

  container_definitions = jsonencode(
    [
      {
        name              = "bmlt-root-server",
        volumesFrom       = [],
        extraHosts        = null,
        dnsServers        = null,
        disableNetworking = null,
        dnsSearchDomains  = null,
        portMappings = [
          {
            hostPort      = 0,
            containerPort = 8000,
            protocol      = "tcp"
          }
        ],
        hostname              = null,
        essential             = true,
        entryPoint            = null,
        mountPoints           = [],
        ulimits               = null,
        dockerSecurityOptions = null,
        environment = [
          {
            name  = "GKEY",
            value = var.GOOGLE_API_KEY
          },
          {
            name  = "DBNAME",
            value = "rootserver"
          },
          {
            name  = "DBUSER",
            value = "rootserver"
          },
          {
            name  = "DBPASSWORD",
            value = "rootserver"
          },
          {
            name  = "DBSERVER",
            value = "bmlt-db"
          },
          {
            name  = "DBPREFIX",
            value = "na"
          }
        ],
        links                  = ["bmlt-db"],
        workingDirectory       = "/tmp",
        readonlyRootFilesystem = null,
        image                  = "${aws_ecrpublic_repository.bmlt-root-server.repository_uri}:3.0.0",
        command = [
          "/bin/bash",
          "/tmp/start-bmlt.sh"
        ],
        user         = null,
        dockerLabels = null,
        logConfiguration = {
          logDriver = "awslogs",
          options = {
            awslogs-group         = aws_cloudwatch_log_group.bmlt_root.name,
            awslogs-region        = "us-east-1",
            awslogs-stream-prefix = "bmlt-root"
          }
        },
        memoryReservation = 256,
        privileged        = null,
        linuxParameters = {
          initProcessEnabled = true
        }
      },
      {
        name              = "bmlt-db",
        volumesFrom       = [],
        extraHosts        = null,
        dnsServers        = null,
        disableNetworking = null,
        dnsSearchDomains  = null,
        portMappings = [
          {
            containerPort = 3306,
            protocol      = "tcp"
          }
        ],
        hostname              = null,
        essential             = true,
        mountPoints           = [],
        ulimits               = null,
        dockerSecurityOptions = null,
        environment = [
          {
            name  = "MARIADB_ROOT_PASSWORD",
            value = "rootserver"
          },
          {
            name  = "MARIADB_DATABASE",
            value = "rootserver"
          },
          {
            name  = "MARIADB_USER",
            value = "rootserver"
          },
          {
            name  = "MARIADB_PASSWORD",
            value = "rootserver"
          }
        ],
        links                  = [],
        workingDirectory       = "/tmp",
        readonlyRootFilesystem = null,
        image                  = "${aws_ecrpublic_repository.bmlt-root-server-sample-db.repository_uri}:unstable",
        user                   = null,
        dockerLabels           = null,
        logConfiguration = {
          logDriver = "awslogs",
          options = {
            awslogs-group         = aws_cloudwatch_log_group.bmlt_db.name,
            awslogs-region        = "us-east-1",
            awslogs-stream-prefix = "bmlt-db"
          }
        },
        memoryReservation = 144,
        privileged        = null,
        linuxParameters = {
          initProcessEnabled = true
        }
      }
    ]
  )
}

resource "aws_ecs_service" "bmlt_unstable" {
  name                               = "bmlt-unstable"
  cluster                            = aws_ecs_cluster.main.id
  desired_count                      = 1
  iam_role                           = aws_iam_role.bmlt_lb.name
  task_definition                    = aws_ecs_task_definition.bmlt_unstable.arn
  enable_execute_command             = true
  deployment_minimum_healthy_percent = 100

  load_balancer {
    target_group_arn = aws_alb_target_group.bmlt_unstable.id
    container_name   = "bmlt-root-server"
    container_port   = 8000
  }

  depends_on = [
    aws_iam_role_policy.bmlt_lb,
  ]

  #  lifecycle {
  #    ignore_changes = [task_definition]
  #  }
}
