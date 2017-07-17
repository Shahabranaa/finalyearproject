// CFG Tokenization.cpp : Defines the entry point for the console application.
//

#include "user-defined-datatypes.h"
#include <iostream>
#include <string>
#include <fstream>

using namespace std;

RList * first_rlist=nullptr,* last_rlist=nullptr;

void loadCFGFromFile(string);
void buildRuleList(string s);
RList * addRuleList(string s);
void addRule(RList * node, string rule);
void deleteRuleList(RList * node);
void deleteRule(RList * pnode,Rule * node);
bool isTerminal(char ch);
void printCFG();
void checkIfDLeftRec();
void removeNullP(); 
void null();
void unit();
void leftFactor();
void uselessProdR();

int main()
{
	loadCFGFromFile("cfg.txt");
	
	printCFG();

	//Delete rule(f) from (A)
	//deleteRule(first_rlist->next_rlist, first_rlist->next_rlist->head->next);

	//Delete (B)
	//deleteRuleList(first_rlist->next_rlist->next_rlist);

	//Delete (S)
	//deleteRuleList(first_rlist);

	//printCFG();

	//removeNullP();
	
	cout << endl << "After removing Unit Productions:" << endl;
	unit();
	cout << endl;

	printCFG();
	
	cout << endl << "After removing Null Productions:" << endl;
	null();
	cout << endl;

	printCFG();
	
	cout << endl << "After removing Direct Left Recursion: " << endl;
	checkIfDLeftRec();
	cout << endl;

	printCFG();
	
	//cout << endl << "After Left Factoring:" << endl;
	//leftFactor();
	//cout << endl;

	//printCFG();
	
	cout << endl << "After removing useless Productions:" << endl;
	uselessProdR();
	
	printCFG();
	
	system("pause");

    return 0;
}

void loadCFGFromFile(string fname)
{
	ifstream fin;
	fin.open(fname);

	//String to get the complete line from file
	string rlist;
	
	//check if the file was available and is open
	if (fin.is_open())
	{
		//read till the end of file
		while (!fin.eof())
		{
			//Read first file from the file
			getline(fin,rlist);

			//Create a new rule list assuming that each row is a new set of rules
			buildRuleList(rlist);
						
		}
		fin.close();
	}
	else
		cout << "File not found." << endl;

	
}

RList * addRuleList(string s)
{
	RList * temp = new RList;

	//Prepare the Non Terminal Symbol
	(temp->s).s = s.at(0);
	(temp->s).terminal = 0;
	temp->head = nullptr;
	temp->last = nullptr;
	temp->next_rlist = nullptr;
	temp->prev_rlist = nullptr;

	if (first_rlist == nullptr)
	{
		first_rlist = temp;
		last_rlist = temp;
	}
	else
	{
		last_rlist->next_rlist = temp;
		temp->prev_rlist = last_rlist;
		last_rlist = temp;
	}

	return temp;
}


void buildRuleList(string rlist)
{
	RList * temp = addRuleList((rlist.substr(0, rlist.find('-'))));

	//Update the string
	rlist = rlist.substr(rlist.find('>')+1,rlist.length());

	//prepare the rules
	while (rlist.find('|') != string::npos)
	{
		addRule(temp, rlist.substr(0, rlist.find('|')));
		rlist = rlist.substr(rlist.find('|') + 1, rlist.length());
	}

	if(rlist.length()>0)
		addRule(temp, rlist);
}


void addRule(RList * node, string rule)
{
	Rule * temp = new Rule;

	int i = 0;

	for (;i < rule.length(); i++)
	{
		temp->rule[i].s = rule.at(i);
		temp->rule[i].terminal = isTerminal(temp->rule[i].s);
	}

	//End marker for end of symbols
	temp->rule[i].s = '\0';

	temp->next = nullptr;
	temp->prev = nullptr;

	if (node->head == nullptr)
	{
		node->head = temp;
		node->last = temp;
	}
	else
	{
		node->last->next = temp;
		temp->prev = node->last;
		node->last = temp;
	}

}


bool isTerminal(char ch)
{
	if (ch >= 'A' && ch <= 'Z') return false;
	else
		if (ch >= 'a' && ch <= 'z') return true;
		else
			return false;
}


void deleteRuleList(RList * node)
{
	//safety check
	if (first_rlist != nullptr)
	{
		//if first node
		if (node->prev_rlist == nullptr)
		{
			first_rlist = node->next_rlist;
			node->next_rlist->prev_rlist = nullptr;
		}
		//if last node
		else if (node->next_rlist == nullptr)
		{
			node->prev_rlist->next_rlist = nullptr;
			last_rlist = node->prev_rlist;
		}
		//if middle node
		else
		{
			node->prev_rlist->next_rlist = node->next_rlist;
			node->next_rlist->prev_rlist = node->prev_rlist;
		}
	}

	//Memory leak still to be handled
	delete node;

}

void deleteRule(RList * pnode, Rule * node)
{
	//safety check
	if (pnode->head != nullptr)
	{
		//if first node
		if (node->prev == nullptr)
		{
			pnode->head = node->next;
			node->next->prev = nullptr;
		}
		//if last node
		else if (node->next == nullptr)
		{
			node->prev->next = nullptr;
			pnode->last = node->prev;
		}
		//if middle node
		else
		{
			node->prev->next = node->next;
			node->next->prev = node->prev;
		}
	}

	//Memory leak still to be handled
	delete node;

}


void printCFG()
{
	for (RList * list = first_rlist; list != nullptr; list = list->next_rlist)
	{
		cout << list->s.s << " -> ";

		for (Rule * r = list->head; r != nullptr; r = r->next)
		{
			for (int i = 0; r->rule[i].s != '\0'; i++)
			{
				cout << r->rule[i].s;
				isTerminal(r->rule[i].s);
			}

			if(r->next != nullptr)
				cout << "|";
		}

		cout << endl;
	}
	
}

void checkIfDLeftRec()
{
	int left = 0, first = 0;
	char string[100];
	char dup[10]; int dup_chk = 0;
	int check = 3;

	for (RList * list = first_rlist; list != nullptr; list = list->next_rlist)
	{
		for (Rule * y = list->head; y != nullptr; y = y->next){
			for (int i = 0; y->rule[i].s != '\0'; i++){
				if (i == 0){
					if (!isTerminal(y->rule[i].s) && y->rule[i].s == list->s.s){
						left = 1;
						y->deleteable = 1;

						if (first == 0){
							string[0] = rand() % 100;
							string[1] = '-';
							string[2] = '>';
							first = 1;
						}

						for (int j = 0; y->rule[j].s != '\0'; j++){
							if (y->rule[j].s != list->s.s || j != 0){
								string[check] = y->rule[j].s;
								check++;
							}
						}
						string[check] = string[0];
						string[++check] = '|';
						check++;
					}
				}
			}
		}
		if (left == 1){

				first = 0;
				string[check] = '^';
				string[++check] = '\0';
				buildRuleList(string);
				check = 3;
				left = 0;

			for (Rule * r = list->head; r != nullptr; r = r->next)
			{
				for (int i = 0; r->rule[i].s != '\0'; i++)
				{
					if (r->deleteable != 1 && r->rule[i].s!=string[0] && r->rule[i].s!='^'){

						dup[dup_chk] = r->rule[i].s;
						dup_chk++;
					}
					else{
						if (r->rule[i].s == string[0]){
							dup_chk = 0;
						}
					}
				}
				if (dup_chk > 0){
					r->deleteable = 1;
					dup[dup_chk] = string[0];
					dup[++dup_chk] = '\0';
					addRule(list, dup);
					dup_chk = 0;
				}
			}
		}
	}

	int loop = 0;
	while (loop<100)
	for (RList * list = first_rlist; list != nullptr; list = list->next_rlist)
	{

		for (Rule * r = list->head; r != nullptr; r = r->next)
		{
			if (r->deleteable){
				deleteRule(list, r);
				break;
			}
		}
		loop++;
	}
}

void removeNullP(){
	int prodN = 0;

	for (RList * list = first_rlist; list != nullptr; list = list->next_rlist)
	{
		prodN++;

	}
	nullP ** arr;
	arr = new nullP * [prodN];
	for (int x = 0; x < prodN; x++)
		arr[x] = new nullP[1];

	prodN = 0;
	for (RList * list = first_rlist; list != nullptr; list = list->next_rlist)
	{
		//cout << list->s.s << " -> ";
		arr[prodN]->s.s = list->s.s;
		prodN++;

	}
	prodN = 0;
	for (RList * list = first_rlist; list != nullptr; list = list->next_rlist)
	{

		for (Rule * r = list->head; r != nullptr; r = r->next)
		{
			for (int i = 0; r->rule[i].s != '\0'; i++)
			{
				if (r->rule[i].s == '^'){
					arr[prodN]->nullable = true;
					arr[prodN]->aCleared = false;
				}
			}
		}
		prodN++;
	}

	for (int x = 0; x < prodN; x++){
		cout << endl << "Prod: " << arr[x]->s.s << " Nullable: " << arr[x]->nullable << " Cleared: " << arr[x]->aCleared << endl;
	}
	
	RList * list = first_rlist;
	while (list->next_rlist != nullptr)
		list = list->next_rlist;

	for (Rule * r = list->head; r != nullptr; r = r->next)
	{
		for (int i = 0; r->rule[i].s != '\0'; i++)
		{
			if (r->rule[i].s == '^'){
				deleteRule(list, r);
			}
		}
	}

	printCFG();
}

void leftFactor(){
	char string[100];
	int str = 3;
	int string_check = 0, str_continue = 0;
	char dup[40];
	int dup_check = 0, dup_match = 0, dup_traverse = 0;
	int leftFactor = 0;

	RList * list = first_rlist;

	while (list != nullptr){

		for (Rule * r = list->head; r != nullptr; r = r->next){
			for (int i = 0; r->rule[i].s != '\0'; i++){

				if (i == 0 && r->refactor==0 || string_check == 1 && r->rule[i].terminal && r->refactor==0){
					dup[dup_check] = r->rule[i].s;
					dup_check++;
					string_check = 1;
				}
				else{
					if (string_check == 1 || str_continue==1){
						string_check = 0;
						str_continue = 1;
						string[str] = r->rule[i].s;
						str++;
						r->refactor = 1;
					}
				}

			}
		
			for (Rule * y = r->next; y != nullptr; y = y->next){
				int first_NT = 0;
				for (int i = 0; y->rule[i].s != '\0'; i++){
					if (dup_traverse <= dup_check){
						if (y->rule[i].s == dup[dup_traverse]){

							dup_traverse++;

							if (dup_traverse == dup_check){
								dup_match = 1;
								leftFactor = 1;
								dup_traverse++;

								if (y->rule[i + 1].s == '\0'){
									string[str] = '|';
									str++;
									string[str] = '^';
									str++;
									y->deleteable = 1;
									r->deleteable = 1;
								}

							}
						}
						else
							leftFactor = 0;
					}
					else{
						if (dup_match == 1){
							if (y->refactor==0){
								if (first_NT == 0){
									string[str] = '|';
									str++;
									string[str] = y->rule[i].s;
									str++;
									first_NT = 1;
									r->deleteable = 1;
									y->deleteable = 1;
								}
								else{
									string[str] = y->rule[i].s;
									str++;
								}
							}
						}
					}
					
					if (y->rule[i+1].s == '\0'&&dup_match==1){
						y->refactor = 1;
					}
				}

				dup_traverse = 0;
				dup_match = 0;
			}
			if (leftFactor == 1){

				string[0] = rand() % 100;
				string[1] = '-';
				string[2] = '>';

				dup[dup_check] = string[0];

				dup[++dup_check] = '\0';
				string[str] = '\0';

				addRule(list, dup);
				buildRuleList(string);

			}

			for (int x = 0; x <= str; x++){
				string[x] = NULL;
			}
			for (int x = 0; x <= dup_check; x++){
				dup[x] = NULL;
			}
			str = 3;
			str_continue = 0;
			dup_check = 0;
		}

		list = list->next_rlist;
	}//While Loop

	int none = 0;
	
	while (none < 10){
		for (RList * list = first_rlist; list != nullptr; list = list->next_rlist)
		{

			for (Rule * r = list->head; r != nullptr; r = r->next)
			{
				if (r->deleteable == 1){
					deleteRule(list, r);
					break;
				}
			}
		}
		none++;
	}
}

void null(){
	RList * list = first_rlist;
	RList * list2 = first_rlist;
	int null = 0;
	int check = 0;
	char string[10];

	while (list->next_rlist != nullptr)
		list = list->next_rlist;

	while (list != nullptr){
		for (Rule * r = list->head; r != nullptr; r = r->next)
		{
			for (int i = 0; r->rule[i].s != '\0'; i++)
			{
				if (r->rule[i].s == '^'){
					r->deleteable = 1;
					while (list2 != nullptr){
						for (Rule * y = list2->head; y != nullptr; y = y->next){
							for (int j = 0; y->rule[j].s != '\0'; j++){

								if (y->rule[j].s == list->s.s){
									for (int z = 0; y->rule[z].s != '\0'; z++){

										if (y->rule[z].s != list->s.s){
											
												string[check] = y->rule[z].s;
												check++;
										}
									}
									string[check] = '\0';
									addRule(list2, string);
									check = 0;
								}
							}
						}
						list2 = list2->next_rlist;
					}
				
				}
			}
		}

		list = list->prev_rlist;
		list2 = first_rlist;
	}
	for (RList * list = first_rlist; list != nullptr; list = list->next_rlist)
	{

		for (Rule * r = list->head; r != nullptr; r = r->next)
		{
			if (r->deleteable){
				deleteRule(list, r);
				break;
			}
		}
	}
}

void unit(){
	RList * list = first_rlist;
	RList * list2 = first_rlist;
	int unit = 0;
	int check = 0;
	char string[10];

	while (list->next_rlist != nullptr)
		list = list->next_rlist;

	while (list != nullptr){
		for (Rule * r = list->head; r != nullptr; r = r->next)
		{
			for (int i = 0; r->rule[i].s != '\0'; i++)
			{
				if (i == 0){
					if (r->rule[i + 1].s == '\0'){
						if (!r->rule[i].terminal && r->rule[i].s!='^'){
							r->deleteable = 1;

								if (list2->s.s == r->rule[i].s){

									if (list2->s.s != list->s.s){
										for (Rule * y = list2->head; y != nullptr; y = y->next)
										{
											for (int i = 0; y->rule[i].s != '\0'; i++)
											{
												string[check] = y->rule[i].s;
												check++;
											}
											string[check] = '\0';
											addRule(list, string);
											check = 0;
										}
									}
								}
								else{
									RList * temp;

									for (temp = list2; temp != nullptr; temp = temp->next_rlist){
										if (temp->s.s == r->rule[i].s)
											break;

									}

									list2 = temp;

									if (list2->s.s != list->s.s){
										for (Rule * z = list2->head; z != nullptr; z = z->next)
										{
											for (int i = 0; z->rule[i].s != '\0'; i++)
											{
												string[check] = z->rule[i].s;
												check++;
											}
											string[check] = '\0';
											addRule(list, string);
											check = 0;
										}
									}

									list2 = first_rlist;
								}
						}
					}
				}

			}
			list2 = first_rlist;
		}
		list = list->prev_rlist;
	}

	for (RList * list = first_rlist; list != nullptr; list = list->next_rlist)
	{

		for (Rule * r = list->head; r != nullptr; r = r->next)
		{
			if (r->deleteable){
				deleteRule(list, r);
				break;
			}
		}
	}
}

void uselessProdR(){
	int found = 0;
	for (RList * list = first_rlist; list != nullptr; list = list->next_rlist)
	{
		for (RList * list2 = first_rlist; list2 != nullptr; list2 = list2->next_rlist){

			for (Rule * r = list2->head; r != nullptr; r = r->next){
				for (int i = 0; r->rule[i].s != '\0'; i++){
					if (list->s.s == r->rule[i].s){
						found = 1;
						break;
					}
				}
			}
		}

		if (found == 0){
			list->deletable = 1;
		}
		found = 0;
	}

	for (RList * list = first_rlist; list != nullptr; list = list->next_rlist)
	{
		if (list->deletable == 1){
			deleteRuleList(list);
			break;
		}
	}
}