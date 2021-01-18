"""def matrix_multiplication(M,N):
	R=[[0,0,0,0],
	   [0,0,0,0],
	   [0,0,0,0],
	   [0,0,0,0]]

	for i in range(0,4):
		for j in range(0,4):
			for k in range(0,4):
				R[i][j]+=M[i][k]*N[k][j]
	for i in range(0,4):
		for j in range(0,4):
			print(R[i][j],end=" ")
		print("\n",end="")

M=[[1,1,1,1],
   [2,2,2,2],
   [3,3,3,3],
   [4,4,4,4]]
N=[[1,1,1,1],
   [2,2,2,2],
   [3,3,3,3],
   [4,4,4,4]]

matrix_multiplication(M,N)"""


"""class AdjNode:
	def __init__(self,data):
		self.vertex=data
		self.next=None

class Graph:
	def __init__(self,vertices):
		self.V=vertices
		self.graph=[None]*self.V

	def add_edges(self,src,dest):
		node=AdjNode(dest)
		node.next=self.graph[src]

		node=AdjNode(src)
		node.next=self.graph[dest]
		self.graph[dest]=node

	def print_graph(self):
		for i in range(self.V):
			print("Adjacency list of vertex {} \n head".format(i),end="")
			temp=self.graph[i]
			while temp:
				print("-> {}".format(temp.vertex),end="")
				temp=temp.next
			print("\n")

if __name__=="__main__":
	V=5
	graph=Graph(V)
	graph.add_edges(0,1)
	graph.add_edges(0,4)
	graph.add_edges(1,2)
	graph.add_edges(1,3)
	graph.add_edges(1,4)
	graph.add_edges(2,3)
	graph.add_edges(3,4)

	graph.print_graph()"""

"""from collections import defaultdict

class Graph:
	def __init__(self):
		self.graph=defaultdict(list)

	def addEdge(self,u,v):
		self.graph[u].append(v)
	def bfs(self,s):
		visited=[False]*(max(self.graph)+1)

		queue=[]

		queue.append(s)
		visited[s]=True

		while queue:
			s=queue.pop(0)
			print(s,end=" ")

			for i in self.graph[s]:
				if visited[i]==False:
					queue.append(i)
					visited[i]=True

g=Graph()
g.addEdge(0,1)
g.addEdge(0,2)
g.addEdge(1,2)
g.addEdge(2,0)
g.addEdge(2,3)
g.addEdge(3,3)

g.bfs(2)"""



#DFS

from collections import defaultdict
class Graph:
	def __init__(self):
		self.graph=defaultdict(list)

	def addNode(self,u,v):
		self.graph[u].append(v)

	def DFSUtill(self,v,visited):
		visited.add(v)

		print(v, end=" ")

		for nei in self.graph[v]:
			if nei not in visited:
				self.DFSUtill(nei,visited)
			


	def DFS(self,v):

		visited=set()

		self.DFSUtill(v,visited)


g=Graph()
g.addNode(0,1)
g.addNode(0,2)
g.addNode(1,2)
g.addNode(2,3)
g.addNode(3,4)
g.addNode(1,5)

g.DFS(1)

